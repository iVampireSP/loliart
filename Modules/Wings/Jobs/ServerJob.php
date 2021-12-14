<?php

namespace Modules\Wings\Jobs;

use ErrorException;
use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Modules\Wings\Entities\WingsNode;
use Illuminate\Queue\SerializesModels;
use Modules\Wings\Entities\WingsServer;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Wings\Entities\WingsNestEgg;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\WingsPanelAccount;
use Modules\Wings\Http\Controllers\PanelController;

class ServerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = (object)$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $server = WingsServer::find($data->id);
        $panel = new PanelController();

        if (is_null($server)) {
            $this->broadcast('failed');
            return false;
        }

        switch ($data->type) {
            case 'create':
                $this->broadcast('creating');
                // 检查 user_id 是否存在
                $user = WingsPanelAccount::find($data->user_id);
                if (is_null($user)) {
                    $this->broadcast('failed:account not found');
                    $server->delete();

                    return false;
                }
                // 检查 egg_id 是否存在
                $egg = WingsNestEgg::find($data->egg_id);
                if (is_null($egg)) {
                    $this->broadcast('failed:egg not found');
                    $server->delete();

                    return false;
                }
                // 检查 node_id 是否存在
                $node = WingsNode::find($data->node_id);
                if (is_null($node)) {
                    $this->broadcast('failed:node not found');
                    $server->delete();

                    return false;
                }

                // 检查 docker 镜像
                if (array_key_exists($data->docker_image, $egg->docker_images)) {
                    $this->broadcast('docker_image:setting up.');
                    $docker_image = $egg->docker_images[$data->docker_image];
                } else {
                    $this->broadcast('docker_image:not found.');
                    $server->delete();

                    return false;
                }

                $this->broadcast('creating');

                $this->broadcast('setup:setting up environment.');
                $environment = [];
                foreach ($egg->environment as $env) {
                    $env = $env['attributes'];
                    $environment[$env['env_variable']] = $env['default_value'];
                }
                $this->broadcast('setup:environment setup complete.');

                $this->broadcast('setup:getting next allocation.');

                $allocation = $this->getNextAllocation($node->node_id);
                if (!$allocation) {
                    $this->broadcast('failed:get next allocation failed.');
                    $server->delete();
                }

                $this->broadcast('setup:done, next allocation is ' . $allocation);

                $this->broadcast('setup:creating server.');
                $result = $panel->createServer([
                    "name" => $data->name,
                    "user" => $user->user_id,
                    "egg" => $data->egg_id,
                    "docker_image" => $docker_image,
                    "startup" => $egg->startup,
                    "environment" => $environment,
                    "limits" => [
                        "memory" => $data->memory,
                        "swap" => 100,
                        "disk" => $data->disk,
                        "io" => 500,
                        "cpu" => $data->cpu_limit
                    ],
                    "feature_limits" => [
                        "databases" => 1,
                        "backups" => $data->backups,
                        "allocations" => $data->allocation_limit,
                    ],
                    "allocation" => [
                        "default" => $allocation
                    ]
                ]);
                if (!$result) {
                    $this->broadcast('failed:fail to create server.');
                    $server->delete();
                } else {
                    $this->broadcast('created:created server successfully');
                    $server->status = 'created';
                    $server->server_id = $result['attributes']['id'];
                    $server->allocation_id = $allocation;
                    $server->save();
                }
                break;
        }
    }

    public function getNextAllocation($node_id)
    {
        $panel = new PanelController();
        $next_page = 1;
        $is_continue = true;
        $selected_id = 0;
        try {
            do {
                $allocations_data = $panel->allocations($node_id, $next_page);
                $total_page = $allocations_data['meta']['pagination']['total_pages'];

                if ($next_page == $total_page) {
                    $is_continue = false;
                } else {
                    $next_page = $allocations_data['meta']['pagination']['current_page'] + 1;
                }

                foreach ($allocations_data['data'] as $allocation) {
                    if (!$allocation['attributes']['assigned']) {
                        $selected_id = $allocation['attributes']['id'];
                        return $selected_id;
                    }
                }
            } while ($is_continue);
        } catch (ErrorException $e) {
            echo $e;
            unset($e);
            return false;
        }
    }

    public function broadcast($event)
    {
        broadcast(new TeamEvent(
            $this->data->team_id,
            [
                'type' => 'wings.server.' . $event,
                'data' => $this->data->id,
                'status' => $event
            ]
        ));
    }
}
