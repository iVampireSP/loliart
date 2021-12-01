<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Traits\Teams;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeamController extends Controller
{
    use Teams;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   $projects = ProjectMember::where('user_id', Auth::id())->with('project')->get();
        // $teams = Team::where('user_id', auth()->id())->get();
        $teams = TeamUser::where('user_id', auth()->id())->with('team')->get();
        return view('teams.index', compact('teams'));
        // $this->switchToTeam(1);
        // return session()->get('key');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required|max:20'
        ]);

        $team->name = $request->name;
        $team->user_id = auth()->id();
        $team->save();

        TeamUser::create([
            'user_id' => auth()->id(),
            'team_id' => $team->id,
        ]);

        return response()->json(['status' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = new Team();
        $team = $team->where('id', $id)->with('users')->firstOrFail();
        $team_users = TeamUser::where('team_id', $id)->with('user')->get();

        // 切换团队
        $this->switchToTeam($team);
        app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId($team->id);

        return view('teams.show', compact('team_users', 'team'));
    }

    public function afk()
    {
        $this->switchToTeam(0);
        return response()->json([
            'status' => 1,
            'data' => tr('You are offline now!')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            $team->delete();
            return response()->json([
                'status' => 1,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'data' => $e->getMessage()
            ]);
        }
    }
}