<?php

namespace Modules\Wings\Http\Controllers;

use App\Events\TeamEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Wings\Jobs\NodeJob;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Entities\WingsLocation;
use Illuminate\Contracts\Support\Renderable;

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

        $location_orm = WingsLocation::where('team_id', session('team_id'))->where('id', $request->location_id);
        $location = $location_orm->first();
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
            'wings_locations_id' => $location->location_id,
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
        $location_orm->increment('node_count');

        $data['location_id'] = $location->location_id;
        $data['daemonListen'] = $location->daemon_listen;
        $data['daemonSFTP'] = $location->daemon_sftp;

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
        $panel = new PanelController();

        if (!auth()->user()->can('team.access')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }
        $locations = WingsLocation::where('team_id', session('team_id'))->get();

        $cache_key = 'wings_nodes_config' . $node->node_id;
        if (Cache::has($cache_key)) {
            $node_configuration = Cache::get($cache_key);
        } else {
            $node_configuration = Yaml::dump($panel->nodeConfig($node->node_id), 4, 2, Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE);
            Cache::put($cache_key, $node_configuration, 600);
        }

        return view('wings::nodes.show', compact('node', 'locations', 'node_configuration'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, WingsNode $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'location_id' => 'integer|required',
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
            'reset_secret' => 'boolean',
        ]);

        if (!auth()->user()->can('node.edit')) {
            return response()->json(['status' => 0, 'data' => 'Permission denied.']);
        }

        $location = WingsLocation::where('team_id', session('team_id'))->where('id', $request->location_id)->first();
        if (is_null($location)) {
            return response()->json(['status' => 0, 'data' => 'Location not found.']);
        }

        $orm = WingsNode::where('id', $request->route('node'))->where('location_id', $request->route('location'));
        $node = $orm->first();

        $request->validate([
            'fqdn' => [
                'required', Rule::unique('wings_nodes')->ignore($node->id)
            ]
        ]);

        $data = [
            'type' => 'update',
            'team_id' => session('team_id'),
            'description' => $request->name,
            'display_name' => $request->name,
            'name' => $node->name,
            'location_id' => $location->location_id,
            'pl_location_id' => $location->id,
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
            'status' => 'created',
            'maintenance_mode' => (bool)$request->maintenance_mode ?? false
        ];

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

            dispatch(new NodeJob($node->id, $data));

            $orm->update([
                'display_name' => $request->name,
            ]);

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