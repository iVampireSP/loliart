<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class SetLocate
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
        $languages = Agent::languages();
        $languages = $languages;
        // App::setLocale($languages);
        if (session()->get('locate') != $languages) {
            session()->forget('locate');
        }
        session()->put('locate', $languages);
        return $next($request);
    }
}
