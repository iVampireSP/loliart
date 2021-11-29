<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
        $teams = Team::where('user_id', auth()->id())->get();
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

        // 切换团队
        $this->switchToTeam($team);

        session()->flash('message', tr('Your team has been switched.'));

        return view('teams.show', compact('team'));
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
        //
    }

    public function invite($email)
    {
        return 1;
        // return auth()->user()->can('invite');
    }
}