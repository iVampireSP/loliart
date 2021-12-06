<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Wings\Entities\WingsLocation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Http\Controllers\PanelController;

class LocationJob implements ShouldQueue
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
        $panel = new PanelController();

        $data = $this->data;
        $wingsLocations_where = WingsLocation::where('id', $data->id);

        switch ($data->type) {
            case 'create':

                $wingsLocations_where->update([
                    'status' => 'creating'
                ]);

                broadcast(new TeamEvent(
                    $data->team_id,
                    [
                        'type' => 'wings.locations.creating',
                        'data' => $data->id,
                        'status' => 'creating'
                    ]
                ));

                broadcast(new TeamEvent(
                    $data->team_id,
                    [
                        'type' => 'wings.locations.calling',
                        'data' => $data->id,
                        'status' => 'creating'
                    ]
                ));

                if (!$response = $panel->createLocation($data->short, $data->name)) {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.failed',
                            'data' => $data->id,
                            'status' => 'failed'
                        ]
                    ));

                    $wingsLocations_where->delete();
                } else {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.created',
                            'data' => $data->id,
                            'attributes' =>
                            $response['attributes'],
                            'status' => 'created'
                        ]
                    ));

                    $wingsLocations_where->update([
                        'status' => 'created',
                        'location_id' =>  $response['attributes']['id']
                    ]);
                }

                break;

            case 'delete':
                broadcast(new TeamEvent(
                    session('team_id'),
                    [
                        'type' => 'wings.locations.deleting',
                        'data' => $data->id,
                        'status' => 'deleting'
                    ]
                ));

                $wingsLocations_where->update([
                    'status' => 'deleting'
                ]);

                sleep(1);

                broadcast(new TeamEvent(
                    $data->team_id,
                    [
                        'type' => 'wings.locations.calling',
                        'data' => $data->id,
                        'status' => 'creating'
                    ]
                ));

                if ($response = $panel->deleteLocation($data->location)) {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.deleted',
                            'data' => $data->id,
                            'status' => 'deleted'
                        ]
                    ));

                    $wingsLocations_where->delete();
                } else {
                    broadcast(new TeamEvent(
                        $data->team_id,
                        [
                            'type' => 'wings.locations.failed',
                            'data' => $data->id,
                            'status' => 'failed'
                        ]
                    ));
                }

                break;
        }
    }
}