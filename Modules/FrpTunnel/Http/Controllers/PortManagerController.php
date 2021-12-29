<?php

namespace Modules\FrpTunnel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FrpTunnel\Entities\FrpServer;
use Modules\FrpTunnel\Entities\FrpTunnel;

class PortManagerController extends Controller
{
    public function handler(Request $request, FrpServer $server)
    {
        if (is_null($server)) {
            return $this->failed('Server not found');
        }

        if ($request->op != 'NewProxy') {
            return $this->failed('Auth failed.');
        }

        if (!is_null($request->content['user']['user'])) {
            return $this->failed('User not allowed.');
        }

        // Search tunnel
        $tunnel = FrpTunnel::where('client_token', $request->content['proxy_name'])->where('server_id', $server->id)->first();
        if (is_null($tunnel)) {
            return $this->failed('Tunnel not found.');
        }

        if ($request->content['proxy_type'] !== $tunnel->protocol) {
            return $this->failed('Tunnel proxy type not allowed.');
        }

        if ($request->content['proxy_type'] == 'tcp' || $request->content['proxy_type'] == 'udp') {
            if ($request->content['remote_port'] !== $tunnel->remote_port || $tunnel->remote_port < $server->min_port || $tunnel->remote_port > $server->max_port) {
                return $this->failed('Tunnel not allowed.');
            }
        } elseif ($request->content['proxy_type'] == 'http' || $request->content['proxy_type'] == 'https') {
            if ($request->content['custom_domains'][0] != $tunnel->custom_domain) {
                return $this->failed('Tunnel configuration error.');
            }
        }

        writeTeam('Tunnel ' . $tunnel->name . 'login success.', $tunnel->team_id);

        return $this->success();
    }

    private function success()
    {
        $response = [
            "reject" => false,
            "unchange" => true,
        ];

        return response()->json($response);
    }

    private function failed($reason = null)
    {
        return response()->json([
            "reject" => true,
            "reject_reason" => $reason ?? 'Auth failed, please check your tunnel configuration or copy the configuration from ' . config('app.url'),
            "unchange" => true,
        ]);
    }
}
