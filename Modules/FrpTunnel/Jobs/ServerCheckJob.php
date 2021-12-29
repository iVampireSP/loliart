<?php

namespace Modules\FrpTunnel\Jobs;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\FrpTunnel\Entities\FrpServer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\FrpTunnel\Http\Controllers\FrpController;
use Modules\FrpTunnel\Http\Controllers\ServerController;

class ServerCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $frpServer = FrpServer::find($this->id);
        if (!is_null($frpServer)) {
            $frp = new FrpController($this->id);
            $s = new ServerController();
            $s->scanTunnel($frpServer->id);
            if ($frp) {
                teamEvent('frpServer.tunnel.server.updated', null, $frpServer->team_id);
                teamEvent('frpServer.tunnels.updated', null, $frpServer->team_id);
            }
        }
    }
}
