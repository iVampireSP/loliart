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
        $server = McbeFlowServers::where('token', $request->route('token'))->first();
        if (is_null($server)) {
            return fail();
        } else {
            if ($server->status == 'pending') {
                $server->status = 'active';
                $server->save();
            }
        }

        $request->mcbe_server = $server;

        return $next($request);
    }
}
