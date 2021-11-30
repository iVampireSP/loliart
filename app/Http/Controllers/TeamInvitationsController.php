<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TeamInvitation;

class TeamInvitationsController extends Controller
{
    public function index()
    {
        // Show invitations
        $invitations = TeamInvitation::where('team_id', session('team_id'))->get();

        return view('teams.invites', compact('invitations'));
    }

    public function invite(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            return response()->json(['status' => 0, 'data' => 'User not found.']);
        }
        if (TeamInvitation::where('user_id', $user->id)->where('team_id', session('team_id'))->exists()) {
            return response()->json(['status' => 0, 'data' => 'Invitation already exists']);
        }

        // send invite to user
        TeamInvitation::create([
            'user_id' => $user->id,
            'team_id' => session('team_id')
        ]);

        return response()->json(['status' => 1]);
    }

    public function agree()
    {
    }

    public function reject()
    {
    }
}