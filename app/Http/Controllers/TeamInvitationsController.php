<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use App\Models\TeamInvitation;
use Illuminate\Support\Carbon;

class TeamInvitationsController extends Controller
{
    public function index()
    {
        // Show invitations
        $invitations = TeamInvitation::where('team_id', session('team_id'))->with(['user'])->latest()->get();

        return view('teams.invites', compact('invitations'));
    }

    public function invite(Request $request)
    {
        $team = Team::find(session('team_id'));
        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            return response()->json(['status' => 0, 'data' => 'User not found.']);
        }

        if (TeamInvitation::where('user_id', $user->id)->where('team_id', session('team_id'))->exists()) {
            return response()->json(['status' => 0, 'data' => 'Invitation already exists.']);
        }

        if (TeamUser::where('user_id', $user->id)->where('team_id', session('team_id'))->exists()) {
            return response()->json(['status' => 0, 'data' => 'User already in team.']);
        }

        // send invite to user
        TeamInvitation::create([
            'user_id' => $user->id,
            'team_id' => session('team_id')
        ]);

        broadcast(new \App\Events\UserEvent($user->id, [
            'type' => 'team.invitation.received',
            'name' => $team->name,
        ]));

        return response()->json(['status' => 1]);
    }

    public function myInvitations()
    {
        $invitations = TeamInvitation::where('user_id', auth()->id())->simplePaginate(100);

        return view('teams.my_invitations', compact('invitations'));
    }

    public function deleteInvite($id)
    {
        if (TeamInvitation::where('id', $id)->where('team_id', session('team_id'))->exists()) {
            TeamInvitation::where('id', $id)->where('team_id', session('team_id'))->delete();
            return response()->json(['status' => 1, 'data' => 'Delete successfully.']);
        } else {
            return response()->json(['status' => 0, 'data' => 'Invitation not found.']);
        }
    }

    public function agree($id)
    {
        $invitation = TeamInvitation::find($id);
        if (is_null($invitation)) {
            return response()->json(['status' => 0, 'data' => 'Invitation not found.']);
        } elseif (is_null($invitation->agree_at)) {
            // set invitation accepted
            $invitation->agree_at = Carbon::now();
            $invitation->save();
            // create user to team
            return response()->json(['status' => 1, 'data' => 'Accepted successfully.']);
        } else {
            return response()->json(['status' => 0, 'data' => 'Already agree.']);
        }
    }

    public function reject()
    {
    }
}