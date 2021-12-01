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
        $this->validate($request, [
            'email' => 'required|email',
        ]);

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

        broadcast(new \App\Events\TeamEvent($team, [
            'type' => 'team.invitations.updated',
        ]));

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
        $invitation = TeamInvitation::with('team')->find($id);
        if (!is_null($invitation)) {
            TeamInvitation::where('id', $id)->where('team_id', session('team_id'))->delete();

            broadcast(new \App\Events\UserEvent($invitation->user_id, [
                'type' => 'team.invitation.deleted',
                'name' => $invitation->team->name,
            ]));

            broadcast(new \App\Events\TeamEvent($invitation->team, [
                'type' => 'team.invitations.updated',
            ]));

            return response()->json(['status' => 1, 'data' => 'Delete successfully.']);
        } else {
            return response()->json(['status' => 0, 'data' => 'Invitation not found.']);
        }
    }

    public function agree($id)
    {
        $invitation = TeamInvitation::with('team')->find($id);
        if (is_null($invitation)) {
            return response()->json(['status' => 0, 'data' => 'Invitation not found.']);
        } elseif (is_null($invitation->agree_at)) {
            // set invitation accepted
            $invitation->agree_at = Carbon::now();
            $invitation->save();
            // create user to team
            TeamUser::create([
                'user_id' => $invitation->user_id,
                'team_id' => $invitation->team_id,
            ]);

            // give team.invitations.access to user
            setPermissionsTeamId($invitation->team_id);
            auth()->user()->givePermissionTo('team.invitations.access');


            broadcast(new \App\Events\TeamEvent($invitation->team, [
                'type' => 'team.invitations.updated',
            ]));

            return response()->json(['status' => 1, 'data' => 'Accepted successfully.']);
        } else {
            return response()->json(['status' => 0, 'data' => 'Already agree.']);
        }
    }

    public function reject($id)
    {
        $invitation = TeamInvitation::with('team')->find($id);
        if (is_null($invitation)) {
            return response()->json(['status' => 0, 'data' => 'Invitation not found.']);
        } elseif (is_null($invitation->agree_at)) {
            // delete invitation
            $invitation->delete();

            broadcast(new \App\Events\TeamEvent($invitation->team, [
                'type' => 'team.invitations.updated',
            ]));

            return response()->json(['status' => 1, 'data' => 'Rejected successfully.']);;
        }
    }
}