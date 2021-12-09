<?php

namespace Modules\Wings\Jobs;

use App\Events\TeamEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\PanelAccount;
use Modules\Wings\Entities\WingsPanelAccount;
use Modules\Wings\Http\Controllers\PanelController;

class AccountJob implements ShouldQueue
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
        //
        $panel = new PanelController();

        $data = $this->data;
        $wingsPanelAccount = WingsPanelAccount::where('id', $this->id);

        switch ($data->type) {
            case 'create':
                $this->broadcast('creating');
                $status = $panel->createUser([
                    'email' => $data->email,
                    'username' => $data->username,
                    'first_name' => $data->first_name,
                    'last_name' => $data->last_name,
                    'password' => $data->password
                ]);
                if (!$status) {
                    $wingsPanelAccount->delete();
                    $this->broadcast('failed');
                } else {
                    $wingsPanelAccount->update([
                        'status' => 'created',
                        'user_id' => $status['attributes']['id']
                    ]);
                    $this->broadcast('created');
                }
                break;
            case 'update':
                $this->broadcast('updating');
                $data_array = [
                    'email' => $data->email,
                    'username' => $data->username,
                    'first_name' => $data->first_name,
                    'last_name' => $data->last_name,
                ];
                if (!is_null($data->password)) {
                    $data_array['password'] = $data->password;
                }
                $status = $panel->updateUser($wingsPanelAccount->first()->user_id, $data_array);
                if (!$status) {
                    $this->broadcast('failed');
                } else {
                    $data_array['status'] = 'created';
                    unset($data_array['password']);
                    $wingsPanelAccount->update($data_array);
                    $this->broadcast('updated');
                }
                break;

            case 'delete':
                $this->broadcast('deleting');

                $status = $panel->deleteUser($wingsPanelAccount->first()->user_id);
                if (!$status) {
                    $this->broadcast('failed');
                } else {
                    $wingsPanelAccount->delete();
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
                'type' => 'wings.accounts.' . $event,
                'data' => $this->id,
                'status' => $event
            ]
        ));
    }
}