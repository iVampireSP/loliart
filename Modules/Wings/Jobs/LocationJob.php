<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Wings\Entities\WingsLocations;
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
        $wingsLocations_where = WingsLocations::where('id', $data->id);

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

                $panel->createLocation($data->short, $data->name);

                broadcast(new TeamEvent(
                    $data->team_id,
                    [
                        'type' => 'wings.locations.created',
                        'data' => $data->id,
                        'status' => 'created'
                    ]
                ));

                $wingsLocations_where->update([
                    'status' => 'created'
                ]);

                break;
        }
    }
}