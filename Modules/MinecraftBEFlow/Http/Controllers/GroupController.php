<?php

namespace Modules\MinecraftBEFlow\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MinecraftBEFlow\Entities\McbeFlowServers;
use Modules\MinecraftBEFlow\Entities\ServerGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $groups = ServerGroup::where('team_id', session('team_id'))->simplePaginate(10);
        return view('minecraftbeflow::groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('minecraftbeflow::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, ServerGroup $group)
    {
        $request->validate([
            'name' => 'required|max:15',
        ]);

        $group->name = $request->name;
        $group->team_id = session('team_id');

        $group->save();

        write('Group Added.');
        write(route('minecraftBeFlow.groups.index'));

        return success();
    }

    /**
     * Show the specified resource.
     * @param ServerGroup $group
     * @return Renderable
     */
    public function show(ServerGroup $group)
    {
        $servers = McbeFlowServers::where('group_id', $group->id)->simplePaginate(10);
        return view('minecraftbeflow::groups.show', compact('servers', 'group'));
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
     * @param ServerGroup $group
     * @return Renderable
     */
    public function destroy(ServerGroup $group)
    {
        userInTeamFail($group->team_id);

        McbeFlowServers::where('group_id', $group->id)->update(['group_id' => null]);

        $group->delete();

        write('Group deleted.');
        write(route('minecraftBeFlow.groups.index'));

        return success();
    }
}
