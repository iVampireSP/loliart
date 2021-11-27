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

    public function switchToTeam($team_id)
    {
        // 检查是否有团队/在团队中

        session()->put('key', 'value');
    }
}