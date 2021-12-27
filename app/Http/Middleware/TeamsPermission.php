<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;

class TeamsPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(auth()->user())) {
            $team = session('team');
            // 检查团队是否存在
            if (is_null($team) || !$team) {
                $team = null;
            } else {
                $team = Team::find($team->id);
            }
            if (is_null($team) || !$team) {
                session()->forget('team');
                session()->forget('team_id');
                return redirect()->route('teams.index')->with('message', 'Your team does not exist, please create or select a team.');
            } else {
                if (!userInTeam($team->id)) {
                    return session()->put('team', 0);
                }
                session()->put('team_id', $team->id);
                app(PermissionRegistrar::class)->setPermissionsTeamId($team->id);
            }
        }

        return $next($request);
    }
}
