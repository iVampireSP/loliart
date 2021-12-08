<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Modules\Wings\Entities\WingsNode;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\WingsLocation;
use Modules\Wings\Http\Controllers\PanelController;

class NodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $id;
    public $changed;

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

                $node_data = $wingsNode->first();
                if (!$panel->deleteNode($node_data->node_id)) {
                    $wingsNode->update([
                        'status' => 'created'
                    ]);
                    $this->broadcast('failed');
                } else {
                    $wingsNode->delete();
                    $this->broadcast('deleted');
                }
                WingsLocation::find($node_data->location_id)->decrement('node_count');

                break;

            case 'update':
                $this->broadcast('updateing');

                $wingsNode->update([
                    'status' => 'updateing'
                ]);

                $data = (array)$data;
                $update = $panel->updateNode($wingsNode->first()->node_id, $data);
                if (!$update) {
                    $this->broadcast('updated');
                } else {
                    $this->broadcast('failed');
                }

                $this->changed = [
                    'name' => $data['name'],
                    'display_name' => $data['display_name'],
                    'location_id' => $data['pl_location_id'],
                    'fqdn' => $data['fqdn'],
                    'memory' => $data['memory'],
                    'memory_overallocate' => $data['memory_overallocate'],
                    'disk' => $data['disk'],
                    'disk_overallocate' => $data['disk_overallocate'],
                    'upload_size' => $data['upload_size'],
                    'daemon_sftp' => $data['daemon_sftp'],
                    'daemon_listen' => $data['daemon_listen'],
                    'daemon_base' => $data['daemon_base'],
                    'visibility' => $data['visibility'] ?? 0,
                    'behind_proxy' => $data['behind_proxy'] ?? 0,
                    'maintenance_mode' => (bool)$data['maintenance_mode'],
                    'status' => 'created'
                ];

                $wingsNode->update($this->changed);

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