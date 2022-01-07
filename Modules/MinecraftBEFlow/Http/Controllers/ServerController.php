<?php

namespace Modules\MinecraftBEFlow\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\MinecraftBEFlow\Entities\McbeFlowServers;

class ServerController extends Controller
{
    /**
     * Display team's servers
     * @return Renderable
     */
    public function index()
    {
        $servers = McbeFlowServers::where('team_id', session('team_id'))->where('status', '!=', 'deleted')->paginate(10);
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
            'ip' => 'required|ip',
            'port' => 'integer|max:65535|min:1024',
            'start_x' => 'integer|max:10240|min:0',
            'start_z' => 'integer|max:10240|min:0',
            'end_x' => 'integer|max:10240|min:0',
            'end_z' => 'integer|max:10240|min:0',
        ]);

        // 检测服务器是否存在
        $found = McbeFlowServers::where('ip', $request->ip)->where('port', $request->port)->first();
        if (!is_null($found)) {
            if ($found->status == 'deleted') {
                $found->query()->update([
                    'status' => 'pending',
                    'team_id' => session('team_id'),
                    'token' => Str::random(10)
                ]);

                write('Server restored.');
                write(route('minecraftBeFlow.servers.show', $found->id));
                return success();

            } else {
                write('Server already added.');
                return fail();
            }
        }

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
        return view('minecraftbeflow::servers.show', compact('server'));
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
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
}
