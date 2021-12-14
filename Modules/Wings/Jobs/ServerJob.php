<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\WingsNestEgg;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Entities\WingsPanelAccount;
use Modules\Wings\Entities\WingsServer;

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
                if (array_key_exists($data->egg_id, $egg->docker_images)) {
                    $this->broadcast('docker_image:setting up.');
                    $docker_image = $egg->docker_images[$data->egg_id];
                } else {
                    $this->broadcast('docker_image:not found.');
                    $server->delete();

                    return false;
                }

                $this->broadcast('creating');


                break;
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
