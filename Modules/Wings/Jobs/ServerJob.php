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
        $this->broadcast('info: we are getting started.');
        $this->broadcast('info: prepare for you data.');
        $data = $this->data;
        $server = WingsServer::find($data->id);
        $panel = new PanelController();

        if (is_null($server)) {
            $this->broadcast('failed');
            return false;
        }

        switch ($data->type) {
            case 'create':
                $this->broadcast('info: searching infomations');
                $this->broadcast('creating');
                // 检查 user_id 是否存在
                $user = WingsPanelAccount::find($data->user_id);
                if (is_null($user)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:account not found');
                    $server->delete();

                    return false;
                }
                // 检查 egg_id 是否存在
                $egg = WingsNestEgg::find($data->egg_id);
                if (is_null($egg)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:egg not found');
                    $server->delete();

                    return false;
                }
                // 检查 node_id 是否存在
                $node = WingsNode::find($data->node_id);
                if (is_null($node)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:node not found');
                    $server->delete();

                    return false;
                } else {
                    if ($node->location->team_id != $data->team_id) {
                        $this->broadcast('failed');
                        $this->broadcast('info:node not found');
                        return false;
                    }
                }

                // 检查 docker 镜像
                if (array_key_exists($data->docker_image, $egg->docker_images)) {
                    $this->broadcast('info:setting up docker image.');
                    $docker_image = $egg->docker_images[$data->docker_image];
                } else {
                    $this->broadcast('info:docker image not found.');
                    $server->delete();

                    return false;
                }

                $this->broadcast('info:setting up environment.');
                $environment = [];
                foreach ($egg->environment as $env) {
                    $env = $env['attributes'];
                    $environment[$env['env_variable']] = $env['default_value'];
                }
                $this->broadcast('info:environment setup complete.');

                $this->broadcast('info:getting next allocation.');

                $allocation = $this->getNextAllocation($node->node_id);
                if (!$allocation) {
                    $this->broadcast('info:get next allocation failed.');
                    $this->broadcast('failed');
                    $server->delete();
                }

                $this->broadcast('info:done, next allocation is ' . $allocation);

                $this->broadcast('info:creating server.');
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
                    $this->broadcast('failed');
                    $this->broadcast('info:fail to create server.');

                    $server->delete();
                } else {
                    $this->broadcast('created');
                    $this->broadcast('info:created server successfully.');
                    $server->status = 'created';
                    $server->server_id = $result['attributes']['id'];
                    $server->allocation_id = $allocation;
                    $server->save();
                }

                $this->broadcast('info:script finished successfully.');
                $this->broadcast('info:server created, you can reload the page now.');

                break;

            case 'update':
                $this->broadcast('info: searching infomations');
                $this->broadcast('updating');
                // 检查 user_id 是否存在
                $user = WingsPanelAccount::find($data->user_id);
                if (is_null($user)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:account not found');

                    return false;
                }
                // 检查 egg_id 是否存在
                $egg = WingsNestEgg::find($data->egg_id);
                if (is_null($egg)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:egg not found');

                    return false;
                }
                // 检查 node_id 是否存在
                $node = WingsNode::find($data->node_id);
                if (is_null($node)) {
                    $this->broadcast('failed');
                    $this->broadcast('info:node not found');

                    return false;
                }

                // 检查 docker 镜像
                if (array_key_exists($data->docker_image, $egg->docker_images)) {
                    $this->broadcast('info:setting up docker image.');
                    $docker_image = $egg->docker_images[$data->docker_image];
                } else {
                    $this->broadcast('info:docker image not found.');
                    return false;
                }

                $this->broadcast('info:setting up environment.');
                $environment = [];
                foreach ($egg->environment as $env) {
                    $env = $env['attributes'];
                    $environment[$env['env_variable']] = $env['default_value'];
                }

                $this->broadcast('info:environment setup complete.');

                $this->broadcast('info:setting server details.');

                $details = [
                    'name' => $data->name,
                    'user' => $user->user_id,
                    'description' => now()
                ];

                $result = $panel->updateServerDetails($data->server_id, $details);
                $this->broadcast('info:OK!');

                $this->broadcast('info:building server data.');
                $build_data = [
                    "allocation" => $data->allocation_id,
                    "memory" => $data->memory,
                    "swap" => 100,
                    "disk" => $data->disk,
                    "io" => 500,
                    "cpu" => $data->cpu_limit,
                    "feature_limits" => [
                        "databases" => $data->databases,
                        "backups" => $data->backups,
                    ]
                ];
                $this->broadcast('info:updating server build data.');
                $result = $panel->updateServerBuild($data->server_id, $build_data);

                $this->broadcast('info:OK!');

                $this->broadcast('info:building server startup data.');
                $startup_data = [
                    "egg" => $egg->egg_id,
                    "image" => $docker_image,
                    "startup" => $egg->startup,
                    "environment" => $environment,
                    'skip_scripts' => false
                ];
                $this->broadcast('info:updating server startup data.');
                $result = $panel->updateServerStartup($data->server_id, $startup_data);

                var_dump($startup_data);
                $this->broadcast('info:OK!');

                $server->status = 'created';
                $server->save();
                $this->broadcast('info:script finished successfully.');

                if (!$result) {
                    $this->broadcast('failed');
                    $this->broadcast('info:fail to update server.');
                } else {
                    $this->broadcast('updated');
                    $this->broadcast('info:update server successfully.');
                    $server->status = 'created';
                    $server->save();
                }

                $this->broadcast('info:script finished successfully.');
                $this->broadcast('info:server update finished, you can reload the page now.');

                break;

            case 'delete':
                $this->broadcast('deleting');
                $result = $panel->deleteServer($data->server_id);
                if (!$result) {
                    return false;
                    $this->broadcast('failed');
                }
                $this->broadcast('deleted');
                $server->delete();

                break;

            case 'force-delete':
                $this->broadcast('force-deleting');
                $result = $panel->deleteServerForce($data->server_id);
                if (!$result) {
                    return false;
                    $this->broadcast('failed');
                }
                $this->broadcast('deleted');
                $server->delete();
                break;

            case 'suspend':
                break;

            case 'unsuspend':
                break;

            case 'reinstall':
                break;

            case 'toggle-install-status':
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
