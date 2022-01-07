<?php

namespace Modules\MinecraftBEFlow\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\MinecraftBEFlow\Entities\McbeFlowServers;

class Server
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
        // 检测服务器是否存在
        if (!McbeFlowServers::where('token', $request->route('token'))->exists()) {
            return fail();
        }

        return $next($request);
    }
}
