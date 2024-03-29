<?php

namespace App\Http\Controllers;

use App\Events\TeamEvent;
use App\Events\UserEvent;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\TeamUser;
use App\Traits\Teams;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\PermissionRegistrar;

class TeamController extends Controller
{
    use Teams;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teams = TeamUser::where('user_id', auth()->id())->with('team')->get();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $team->name = $request->name;
        $team->user_id = auth()->id();
        $team->save();

        TeamUser::create([
            'user_id' => auth()->id(),
            'team_id' => $team->id,
        ]);

        return response()->json(['status' => 1, 'data' => $team]);
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function show(TeamUser $team)
    {
        $team = $team->team;
        $team_users = TeamUser::where('team_id', $team->id)->with('user')->oldest()->get();

        // 切换团队
        $this->switchToTeam($team);
        app(PermissionRegistrar::class)->setPermissionsTeamId($team->id);

        return view('teams.show', compact('team_users', 'team'));
    }

    public function afk()
    {
        $this->switchToTeam(0);
        return response()->json([
            'status' => 1,
            'data' => tr('You are offline now!'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function edit(Team $team)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $team = Team::find(session('team_id'));

        $team->name = $request->name;
        $team->save();

        // setPermissionsTeamId($team->id);
        // User::find(1)->givePermissionTo('team.update');

        broadcast(new TeamEvent($team, [
            'type' => 'team.updated',
            'data' => $team,
        ]))->toOthers();

        return response()->json(['status' => 1, 'data' => $team->toArray()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return Response
     */
    public function destroy(Team $team)
    {
        try {
            $team->delete();

            broadcast(new TeamEvent($team, [
                'type' => 'team.deleted',
            ]));

            return response()->json([
                'status' => 1,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'data' => $e->getMessage(),
            ]);
        }
    }

    public function kick($id)
    {
        $team = Team::find(session('team_id'));

        if ($id == $team->user_id) {
            return response()->json([
                'status' => 0,
                'data' => 'You are not allowed to kick youself.',
            ]);
        }

        TeamUser::where('user_id', $id)->where('team_id', session('team_id'))->delete();
        TeamInvitation::where('user_id', $id)->where('team_id', session('team_id'))->delete();

        broadcast(new TeamEvent($team, [
            'type' => 'team.users.updated',
        ]));

        broadcast(new UserEvent($id, [
            'type' => 'team.users.beenKicked',
            'data' => $team,
        ]));

        return response()->json([
            'status' => 1,
        ]);
    }

    public function leave()
    {
        $team = Team::find(session('team_id'));

        $user_id = auth()->id();
        if ($user_id == $team->user_id) {
            return response()->json([
                'status' => 0,
                'data' => 'Super admin is not allowed to leave.',
            ]);
        }

        TeamUser::where('user_id', $user_id)->where('team_id', session('team_id'))->delete();
        TeamInvitation::where('user_id', $user_id)->where('team_id', session('team_id'))->delete();

        broadcast(new TeamEvent($team, [
            'type' => 'team.users.updated',
        ]));

        return response()->json([
            'status' => 1,
        ]);
    }

    public function broadcast(Request $request)
    {
        teamEvent('team.broadcast', $request->content);

        write('Broadcasting message.');

        return response()->json([
            'status' => 1,
        ]);
    }

    public function log(Request $request)
    {
        teamEvent('team.log', $request->content);

        return response()->json([
            'status' => 1,
        ]);
    }

    public function writeToAdmin(Request $request)
    {
        write(auth()->user()->name . ' says ' . $request->content, session('team')->user_id);

        return response()->json([
            'status' => 1,
        ]);
    }
}
