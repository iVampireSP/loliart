<?php

namespace App\Traits;

trait Teams
{

    public function invite($user_id)
    {
    }

    public function hasTeam($team_id)
    {
    }

    public function inTeam($team_id)
    {
    }

    public function switchToTeam($team)
    {
        session()->put('team', $team);
    }
}