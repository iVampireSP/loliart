<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamsPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(auth()->user())) {
            $team = session('team');
            // 检查团队是否存在
            if (is_null($team) || !$team) {
                session()->forget('team');
                session()->forget('team_id');
                return redirect()->route('teams.index')->with('message', 'Your team does not exist, please create or select a team.');
            } else {
                session()->put('team_id', $team->id);
                app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId($team->id);
            }
        }

        return $next($request);
    }
}