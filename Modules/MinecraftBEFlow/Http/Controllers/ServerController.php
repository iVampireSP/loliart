<?php

namespace Modules\MinecraftBEFlow\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Support\Renderable;
use Modules\MinecraftBEFlow\Entities\ServerGroup;
use Modules\MinecraftBEFlow\Entities\McbeFlowPlayers;
use Modules\MinecraftBEFlow\Entities\McbeFlowServers;

class ServerController extends Controller
{
    /**
     * Display team's servers
     * @return Renderable
     */
    public function index()
    {
        $servers = McbeFlowServers::where('team_id', session('team_id'))->where('status', '!=', 'deleted')->simplePaginate(10);
        return view('minecraftbeflow::servers.index', compact('servers'));
    }

    public function no_group()
    {
        $servers = McbeFlowServers::where('team_id', session('team_id'))->where('status', '!=', 'deleted')->whereNull('group_id')->simplePaginate(10);
        return view('minecraftbeflow::servers.no_group', compact('servers'));
    }


    public function explore()
    {
        $servers = McbeFlowServers::where('status', '!=', 'deleted')->simplePaginate(10);
        return view('minecraftbeflow::servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('minecraftbeflow::servers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ip' => 'required|max:30',
            'port' => 'integer|max:65535|min:1024',
        ]);

        // 检测服务器是否存在
        $found = McbeFlowServers::where('ip', $request->ip)->where('port', $request->port)->first();
        if (!is_null($found)) {
            if ($found->status == 'deleted') {
                $found->query()->update([
                    'status' => 'pending',
                    'team_id' => session('team_id'),
                    'token' => Str::random(20)
                ]);

                write('Server restored.');
                write(route('minecraftBeFlow.servers.show', $found->id));
                return success();
            } else {
                write('Server already added.');
                return fail();
            }
        }

        // $can_connect = false;
        // $connection = @fsockopen($request->ip, $request->port, $errno, $errstr, 5);


        // if (is_resource($connection)) {
        //     $can_connect = true;
        //     fclose($connection);
        // }

        // if (!$can_connect) {
        //     write('Unable connect to the server.');
        //     return fail();
        // }

        $req = $request->toArray();


        $req['team_id'] = session('team_id');
        $req['token'] = Str::random(10);

        McbeFlowServers::create($req);

        write(route('minecraftBeFlow.servers.index'));

        write('Server created.');

        return success();
    }

    /**
     * Show the specified resource.
     * @param McbeFlowServers $id
     * @return Renderable
     */
    public function show(McbeFlowServers $server)
    {
        $cache = cache('mcbe_flow_server_' . $server->id, 0);

        $groups = ServerGroup::where('team_id', session('team_id'))->get();

        return view('minecraftbeflow::servers.show', compact('server', 'cache', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('minecraftbeflow::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param McbeFlowServers $server
     * @return Renderable
     */
    public function update(Request $request, McbeFlowServers $server)
    {
        $request->validate([
            'name' => 'required',
            'ip' => 'required|max:30',
            'port' => 'integer|max:65535|min:1024',
            'motd' => 'required|max:20'
        ]);

        userInTeamFail($server->team_id);

        // $connection = @fsockopen('udp://' . $request->ip, $request->port);
        // dd($connection);
        // if (!$connection) {
        //     write('Unable connect to the server.');
        //     return fail();
        // }

        $req = $request->toArray();

        $req['team_id'] = session('team_id');

        if (!$request->group_id) {
            $req['group_id'] = null;
        } else {
            $group = ServerGroup::find($req['group_id']);
            if (is_null($group)) {
                write('Group not found.');
                return fail();
            } else {
                if (!userInTeam($group->team_id)) {
                    return fail();
                }
            }
        }

        $server->update($req);

        teamEvent('minecraftBeFlow.server.list.updated', null, session('team_id'));
        writeTeam('MCBE Server updated.');

        return success();
    }

    /**
     * Remove the specified resource from storage.
     * @param McbeFlowServers $server
     * @return Renderable
     */
    public function destroy(McbeFlowServers $server)
    {
        if (userInTeam($server->team_id)) {
            $server->status = 'deleted';
            $server->save();

            write(route('minecraftBeFlow.servers.index'));
            writeTeam('MCBE Server' . $server->name . ' deleted');

            return success();
        }

        return fail();
    }

    public function version(Request $request)
    {
        $cache_key = 'mcbe_flow_server_' . $request->mcbe_server->id;
        $current = cache($cache_key) ?? [];
        $current['version'] = $request->version;
        cache([$cache_key => $current], 70);

        if ($current['version'] != $request->mcbe_server->version) {
            $request->mcbe_server->query()->update(['version' => $current['version']]);
        }

        return success($request->mcbe_server);
    }

    // public function player(Request $request)
    // {
    //     $req = $request->toArray();

    //     $req['players_count'] = count($req['players']);

    //     cache(['mcbe_flow_server_' . $request->mcbe_server->id => $req], 70);

    //     teamEvent('minecraftBeFlow.server.updated', $req, $request->mcbe_server->team_id);
    //     teamEvent('minecraftBeFlow.server.list.updated', null, $request->mcbe_server->team_id);

    //     return success($request->mcbe_server);
    // }

    public function heartbeat(Request $request)
    {
        $request->validate([
            'version' => 'required'
        ]);

        $req = $request->toArray();

        if (count($req) > 2) {
            return fail('Send data too big.');
        }

        $req['players_count'] = count($req['players']);

        $player = new McbeFlowPlayers();
        // 更新玩家信息
        foreach ($req['players'] as $pl) {
            $pl_q = $player->where('xuid', $pl['xuid']);
            if ($pl_q->exists()) {
                $pl_q->update([
                    'name' => $pl['name']
                ]);

                $pl['server_id'] = $request->mcbe_server->id;
                $pl['server_name'] = $request->mcbe_server->name;
                $pl['at'] = time();

                Cache::put('mcbe_flow_player_' . $pl['xuid'], $pl, 3);
            }
        }

        cache(['mcbe_flow_server_' . $request->mcbe_server->id => $req], 20);

        teamEvent('minecraftBeFlow.server.updated', $req, $request->mcbe_server->team_id);
        teamEvent('minecraftBeFlow.server.list.updated', null, $request->mcbe_server->team_id);

        return success($request->mcbe_server);
    }
}
