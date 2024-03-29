<?php

namespace Modules\Wings\Http\Controllers;

use App\Events\TeamEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Wings\Jobs\ServerJob;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsNest;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Entities\WingsServer;
use Modules\Wings\Entities\WingsLocation;
use Illuminate\Contracts\Support\Renderable;
use Modules\Wings\Entities\WingsPanelAccount;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $servers = WingsServer::where('team_id', session('team_id'))->with(['node', 'account'])->simplePaginate();
        return view('wings::servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $accounts = WingsPanelAccount::where('team_id', session('team_id'))->where('status', 'created')->get();
        $locations = WingsLocation::where('team_id', session('team_id'))->where('status', 'created')->get();
        $nests = WingsNest::get();
        // dd($accounts);
        return view('wings::servers.create', compact('accounts', 'locations', 'nests'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, WingsServer $server)
    {
        $request->validate([
            'name' => 'required|max:20',
            'owner' => 'integer|required',
            'node' => 'integer|required',
            'database_limit' => 'sometimes|integer|max:10',
            'cpu_limit' => 'integer|required',
            'disk' => 'integer|required',
            'memory' => 'integer|required',
            'nest' => 'integer|required',
            'egg' => 'integer|required',
            'docker_image' => 'integer|required',
            'backup_limit' => 'integer|required',
        ]);

        $real_server_name = 'edge-' . Str::random(10);
        $server->name = $real_server_name;
        $server->display_name = $request->name;
        $server->user_id = $request->owner;
        $server->cpu_limit = $request->cpu_limit * 100;
        $server->memory = $request->memory;
        $server->disk = $request->disk;
        $server->databases = 1;
        $server->allocation_limit = $request->allocation_limit;
        $server->egg_id = $request->egg;
        $server->node_id = $request->node;
        $server->backups = $request->backup_limit;
        $server->team_id = session('team_id');

        // Save then dispatch
        $server->save();
        $server->docker_image = $request->docker_image;
        $server->type = 'create';

        broadcast(new TeamEvent(
            $server->team_id,
            [
                'type' => 'wings.server.pending',
                'data' => $server->id,
                'status' => 'pending'
            ]
        ));

        dispatch(new ServerJob($server->toArray()));

        return response()->json(['status' => 1, 'data' => $server->id]);
    }

    /**
     * Show the specified resource.
     * @param Server $server
     * @return Renderable
     */
    public function show(WingsServer $server)
    {
        if (!$server->public) {
            userInTeamFail($server->team_id);
            $accounts = WingsPanelAccount::where('team_id', session('team_id'))->where('status', 'created')->get();
            $nests = WingsNest::get();
            return view('wings::servers.show', compact('server', 'accounts', 'nests'));
        } elseif (userInTeam($server->team_id)) {
            $accounts = WingsPanelAccount::where('team_id', session('team_id'))->where('status', 'created')->get();
            $nests = WingsNest::get();
            return view('wings::servers.show', compact('server', 'accounts', 'nests'));
        }

        return view('wings::servers.public', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('wings::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param WingsServer $server
     * @return Renderable
     */
    public function update(Request $request, WingsServer $server)
    {
        $request->validate([
            'name' => 'required|max:20',
            'database_limit' => 'sometimes|integer|max:10',
            'cpu_limit' => 'integer|required',
            'disk' => 'integer|required',
            'memory' => 'integer|required',
            'nest' => 'integer|required',
            'egg' => 'integer|required',
            'docker_image' => 'integer|required',
            'backup_limit' => 'integer|required',
            'public' => 'boolean',
        ]);

        userInTeamFail($server->team_id);

        $server->display_name = $request->name;
        $server->user_id = $request->owner;
        $server->cpu_limit = $request->cpu_limit * 100;
        $server->memory = $request->memory;
        $server->disk = $request->disk;
        $server->databases = 1;
        $server->allocation_limit = $request->allocation_limit;
        $server->egg_id = $request->egg;
        $server->backups = $request->backup_limit;
        $server->public = $request->public ?? false;

        // Save then dispatch
        $server->status = 'pending';
        $server->save();
        $server->type = 'update';
        $server->docker_image = $request->docker_image;

        broadcast(new TeamEvent(
            $server->team_id,
            [
                'type' => 'wings.server.pending',
                'data' => $server->id,
                'status' => 'pending'
            ]
        ));

        dispatch(new ServerJob($server->toArray()));

        return response()->json(['status' => 1, 'data' => $server->id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param WingsServer $server
     * @return Renderable
     */
    public function destroy(Request $request, WingsServer $server)
    {
        $request->validate(
            [
                'force' => 'required|boolean'
            ]
        );
        broadcast(new TeamEvent(
            $server->team_id,
            [
                'type' => 'wings.server.pending',
                'data' => $server->id,
                'status' => 'pending'
            ]
        ));

        userInTeamFail($server->team_id);
        if ($request->force) {
            $arr = [
                'type' => 'force-delete',
                'id' => $server->id,
            ];
            $arr = array_merge($arr, $server->toArray());
            dispatch(new ServerJob($arr));
        } else {
            $arr = [
                'type' => 'delete',
                'id' => $server->id,
            ];
            $arr = array_merge($arr, $server->toArray());
            dispatch(new ServerJob($arr));
        }

        return response()->json(['status' => 1, 'data' => $server->id]);
    }

    public function explore() {
        $servers = WingsServer::where('public', 1)->simplePaginate();
        return view('wings::servers.explore', compact('servers'));
    }
}
