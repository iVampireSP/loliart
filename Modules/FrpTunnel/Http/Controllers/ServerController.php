<?php

namespace Modules\FrpTunnel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Modules\FrpTunnel\Entities\FrpServer;
use Modules\FrpTunnel\Jobs\ServerCheckJob;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $servers = FrpServer::where('team_id', session('team_id'))->simplePaginate(10);
        return view('frptunnel::servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frptunnel::servers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, FrpServer $frpServer)
    {
        $request->validate($this->rules());

        $request_data = $request->toArray();
        $request_data['team_id'] = session('team_id');

        $frpServer->create($request_data);

        write(route('frpTunnel.servers.index'));
        writeTeam('Frp Server created successfully.');

        return response()->json(['status' => 1]);

    }

    /**
     * Show the specified resource.
     * @param FrpServer $server
     * @return Renderable
     */
    public function show(FrpServer $server)
    {
        userInTeamFail($server->team_id);
        return view('frptunnel::servers.show', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frptunnel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param FrpServer $server
     * @return Renderable
     */
    public function update(Request $request, FrpServer $server)
    {
        $request->validate($this->rules($server->id));
        userInTeamFail($server->team_id);

        $data = $request->toArray();

        $data['allow_http'] = $request->allow_http ?? 0;
        $data['allow_https'] = $request->allow_https ?? 0;
        $data['allow_tcp'] = $request->allow_tcp ?? 0;
        $data['allow_udp'] = $request->allow_udp ?? 0;
        $data['allow_stcp'] = $request->allow_stcp ?? 0;

        $server->update($data);

        // write(route('frpTunnel.servers.show', $server->id));
        writeTeam('Frp Server updated successfully.');

        return response()->json(['status' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(FrpServer $server)
    {
        userInTeamFail($server->team_id);
        $server->delete();
        write(route('frpTunnel.servers.index'));
        writeTeam('Frp Server deleted successfully.');

        return response()->json(['status' => 1]);
    }

    public function rules($id = null)
    {
        return [
            'name' => 'required|max:20',
            'server_address' => [
                'required',
                Rule::unique('frp_servers')->ignore($id),
            ],
            'server_port' => 'required|integer|max:65535|min:1',
            'token' => 'required|max:50',
            'dashboard_port' => 'required|integer|max:65535|min:1',
            'dashboard_user' => 'required|max:20',
            'dashboard_password' => 'required|max:30',
            'allow_http' => 'boolean',
            'allow_https' => 'boolean',
            'allow_tcp' => 'boolean',
            'allow_udp' => 'boolean',
            'allow_stcp' => 'boolean',
            'min_port' => 'required|integer|max:65535|min:1',
            'max_port' => 'required|integer|max:65535|min:1',
            'max_tunnels' => 'required|integer|max:65535|min:1',
        ];
    }

    public function checkServer($id = null)
    {
        if (is_null($id)) {
            // refresh all
            $servers = FrpServer::all();
            FrpServer::chunk(100, function () use ($servers) {
                foreach ($servers as $server) {
                    dispatch(new ServerCheckJob($server->id));
                }
            });
        } else {
            if (FrpServer::where('id', $id)->exists()) {
                dispatch(new ServerCheckJob($id));
                return true;
            } else {
                return false;
            }
        }
    }

    public function scanTunnel($server_id)
    {
        $server = FrpServer::find($server_id);
        if (is_null($server)) {
            return false;
        }

        $frp = new FrpController($server->id);

        if ($server->allow_http) {
            $proxies = $frp->httpTunnels()['proxies'];
            $this->cacheProxies($proxies);
        }

        if ($server->allow_https) {
            $proxies = $frp->httpsTunnels()['proxies'];
            $this->cacheProxies($proxies);
        }

        if ($server->allow_tcp) {
            $proxies = $frp->tcpTunnels()['proxies'];
            $this->cacheProxies($proxies);
        }

        if ($server->allow_udp) {
            $proxies = $frp->udpTunnels()['proxies'];
            $this->cacheProxies($proxies);
        }

        if ($server->allow_stcp) {
            $proxies = $frp->stcpTunnels()['proxies'];
            $this->cacheProxies($proxies);
        }
    }

    private function cacheProxies($proxies)
    {
        foreach ($proxies as $proxy) {
            $cache_key = 'frpTunnel_data_' . $proxy['name'];
            Cache::put($cache_key, $proxy, 90);
        }
    }

    public function getTunnel($name)
    {
        $cache_key = 'frpTunnel_data_' . $name;
        return Cache::get($cache_key);
    }
}
