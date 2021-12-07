<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Modules\Wings\Entities\WingsNode;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Wings\Entities\WingsLocation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Http\Controllers\PanelController;

class NodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $data)
    {
        $this->data = (object)$data;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $panel = new PanelController();

        $data = $this->data;
        $wingsNode = WingsNode::where('id', $this->id);
        echo $this->id;

        switch ($data->type) {
            case 'create':
                broadcast(new TeamEvent(
                    $data->team_id,
                    [
                        'type' => 'wings.locations.node.creating',
                        'data' => $this->id,
                        'status' => 'creating'
                    ]
                ));

                $wingsNode->update([
                    'status' => 'creating'
                ]);

                $node_info = $panel->createNode((array)$data);

                if (!$node_info) {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.node.failed',
                            'data' => $this->id,
                            'status' => 'failed'
                        ]
                    ));

                    $wingsNode->delete();
                } else {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.node.created',
                            'data' => $this->id,
                            'status' => 'created'
                        ]
                    ));

                    $wingsNode->update([
                        'status' => 'created',
                        'node_id' => $node_info['id']
                    ]);
                }
                break;
        }
    }
}
