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
            app(\Spatie\Permission\PermissionRegistrar::class)->setPermissionsTeamId(session('team_id'));
        }

        return $next($request);
    }
}