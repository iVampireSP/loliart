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

        switch ($data->type) {
            case 'create':
                $this->broadcast('creating');

                $wingsNode->update([
                    'status' => 'creating'
                ]);

                $node_info = $panel->createNode((array)$data);

                if (!$node_info) {
                    $this->broadcast('failed');

                    $wingsNode->delete();
                } else {
                    $this->broadcast('created');

                    $wingsNode->update([
                        'status' => 'created',
                        'node_id' => $node_info['attributes']['id']
                    ]);
                }

                break;
            case 'delete':
                $this->broadcast('deleting');

                $wingsNode->update([
                    'status' => 'deleting'
                ]);

                if (!$panel->deleteNode($wingsNode->first()->node_id)) {
                    $wingsNode->update([
                        'status' => 'created'
                    ]);
                    $this->broadcast('failed');
                } else {
                    $wingsNode->delete();
                    $this->broadcast('deleted');
                }
                break;
        }
    }

    public function broadcast($event)
    {
        broadcast(new TeamEvent(
            $this->data->team_id,
            [
                'type' => 'wings.locations.node.' . $event,
                'data' => $this->id,
                'status' => $event
            ]
        ));
    }
}
