<?php

namespace Modules\FrpTunnel\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Modules\FrpTunnel\Entities\FrpServer;

class FrpController extends Controller
{
    public $id;
    protected $frpServer;

    public function __construct($id)
    {
        $this->frpServer = FrpServer::find($id);
        $this->id = $id;
    }

    public function serverInfo()
    {
        return $this->cache('serverinfo', '/serverinfo');
    }

    public function tcpTunnels()
    {
        return $this->cache('tcpTunnels', '/proxy/tcp');
    }

    public function udpTunnels()
    {
        return $this->cache('udpTunnels', '/proxy/udp');
    }

    public function httpTunnels()
    {
        return $this->cache('httpTunnels', '/proxy/http');
    }

    public function httpsTunnels()
    {
        return $this->cache('httpsTunnels', '/proxy/https');
    }

    public function stcpTunnels()
    {
        return $this->cache('stcpTunnels', '/proxy/stcp');
    }

    public function traffic($name)
    {
        return $this->cache('traffic_' . $name, '/traffic/' . $name);
    }

    protected function get($url)
    {
        $addr = 'http://' . $this->frpServer->server_address . ':' . $this->frpServer->dashboard_port . '/api' . $url;
        try {
            $resp = Http::withBasicAuth($this->frpServer->dashboard_user, $this->frpServer->dashboard_password)->get($addr)->json() ?? [];
        } catch (ConnectionException $e) {
            unset($e);
            $resp = false;
        }

        return $resp;
    }

    protected function cache($key, $path = null)
    {
        $cache_key = 'frpTunnel_' . $this->id . '_' . $key;
        if (Cache::has($cache_key)) {
            return Cache::get($cache_key);
        } else {
            if ($path == null) {
                return null;
            } else {
                $data = $this->get($path);
                if (!$data) {
                    // request failed
                    Cache::put($cache_key, [], 10);
                } else {
                    Cache::put($cache_key, $data, 60);
                }
                return $data;
            }
        }
    }

}
