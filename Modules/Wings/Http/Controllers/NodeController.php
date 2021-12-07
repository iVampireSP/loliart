<?php

namespace Modules\Wings\Http\Controllers;

use App\Events\TeamEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Entities\WingsLocation;
use Illuminate\Contracts\Support\Renderable;
use Modules\Wings\Jobs\NodeJob;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(WingsLocation $location, Request $request)
    {
        // $locations = WingsNode::where('location_id')->get();
        // return view('wings::nodes.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        if (!auth()->user()->can('node.edit')) {
            return redirect()->route('wings.locations.index')->with('message', 'You do not have sufficient privileges to create a new node.');
        }
        // 检测 location 是否存在
        if (!WingsLocation::where('id', $request->route('location'))->exists()) {
            return redirect()->route('wings.locations.index')->with('message', 'Location does not exist.');
        }
        $locations = WingsLocation::where('team_id', session('team_id'))->get();

        return view('wings::nodes.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, WingsNode $wingsNode)
    {
        if (!auth()->user()->can('node.edit')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }
        $request->validate([
            'name' => 'required',
            'location_id' => 'integer|required',
            'fqdn' => 'required|unique:wings_nodes',
            'memory' => 'integer|required',
            'memory_overallocate' => 'integer|required',
            'disk' => 'integer|required',
            'disk_overallocate' => 'integer|required',
            'upload_size' => 'integer|required',
            'daemon_sftp' => 'integer|required',
            'daemon_listen' => 'integer|required',
            'behind_proxy' => 'boolean',
            'visibility' => 'boolean',
            'maintenance_mode' => 'boolean',
        ]);

        $name = 'art-' . Str::random(5) . '-' . time();

        $location = WingsLocation::where('team_id', session('team_id'))->where('id', $request->location_id)->first();
        if (is_null($location)) {
            return response()->json(['status' => 0, 'data' => 'Location not found.']);
        }

        $data = [
            'type' => 'create',
            'team_id' => session('team_id'),
            'name' => $name,
            'description' => $request->name,
            'display_name' => $request->name,
            'location_id' => $location->id,
            'wings_locations_id' => $location->id,
            'fqdn' => $request->fqdn,
            'scheme' => "https",
            'memory' => $request->memory,
            'memory_overallocate' => $request->memory_overallocate,
            'disk' => $request->disk,
            'disk_overallocate' => $request->disk_overallocate,
            'upload_size' => $request->upload_size,
            'daemon_sftp' => $request->daemon_sftp,
            'daemon_listen' => $request->daemon_listen,
            'daemon_base' => $request->daemon_base,
            'visibility' => $request->visibility ?? 0,
            'behind_proxy' => $request->behind_proxy ?? 0,
        ];

        $id = $wingsNode->create($data)->id;

        $data['location_id'] = $location->location_id;

        // send data to pterodactyl panel
        dispatch(new NodeJob($id, $data));

        broadcast(new TeamEvent(
            session('team_id'),
            [
                'type' => 'wings.locations.node.pending',
                'data' => $id,
                'status' => 'pending'
            ]
        ));

        return response()->json(['status' => 1, 'data' => $data]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, WingsNode $node)
    {
        // $wingsNode->with('')
        // $servers = WingsServer::where('node_', $id)->get();
        if (!auth()->user()->can('team.access')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }
        return view('wings::nodes.show', compact('node'));
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
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        if (!auth()->user()->can('node.edit')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }

        $orm = WingsNode::where('id', $request->route('node'))->where('location_id', $request->route('location'));
        $node = $orm->first();

        $team_id = $node->location->team_id;

        if (userInTeam($team_id)) {
            broadcast(new TeamEvent(
                session('team_id'),
                [
                    'type' => 'wings.locations.node.update',
                    'data' => $node->id,
                    'status' => 'update'
                ]
            ));

            $orm->update(['display_name' => $request->name]);

            return response()->json(['status' => 1, 'data' => $request->name]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        if (!auth()->user()->can('node.edit')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }

        $node = WingsNode::where('id', $request->route('node'))->where('location_id', $request->route('location'))->first();

        $team_id = $node->location->team_id;
        if (userInTeam($team_id)) {
            broadcast(new TeamEvent(
                session('team_id'),
                [
                    'type' => 'wings.locations.node.pending',
                    'data' => $node->id,
                    'status' => 'pending'
                ]
            ));

            dispatch(new NodeJob($node->id, [
                'type' => 'delete',
                'team_id' => $team_id,
                'node_id' => $node->node_id,
            ]));
        }
    }
}
