<?php

namespace Modules\MinecraftBEFlow\Http\Controllers;

use Svg\Tag\Rect;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Support\Renderable;
use Modules\MinecraftBEFlow\Entities\McbeFlowPlayers;
use Modules\MinecraftBEFlow\Entities\McbeFlowServers;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $player = McbeFlowPlayers::where('user_id', auth()->id())->with(['server'])->first();
        if (!is_null($player)) {
            $cache_key = 'mcbe_flow_player_' . $player->xuid;
            $cache = cache($cache_key);

            session(['mcbe_flow_player_name' => $player->name]);

            return view('minecraftbeflow::player.index', compact('player', 'cache'));
        } else {
            $cache_key = 'mcbe_flow_player_bind_' . auth()->id();
            $cache = cache($cache_key);
            if (is_null($cache)) {
                $random = Str::random(10);
                cache(['mcbe_flow_player_bind_' . auth()->id() => $random], 600);
                cache(['mcbe_flow_player_bind_code_' . $random => auth()->id()], 600);
                userEvent('mcbe.flow.player.bind.refreshed');
            } else {
                $random = cache($cache_key);
            }

            return view('minecraftbeflow::player.setup', compact('random'));
        }
    }

    public function bind(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'xuid' => 'required',
            'name' => 'required'
        ]);

        // 检查验证码是否存在
        $cache_key = 'mcbe_flow_player_bind_code_' . $request->code;
        $cache = cache($cache_key);

        if (is_null($cache)) {
            return fail();
        }

        // 检查是否已经存在绑定
        $player = McbeFlowPlayers::where('xuid', $request->xuid)->first();

        if (is_null($player)) {
            // 可以绑定

            McbeFlowPlayers::create([
                'xuid' => $request->xuid,
                'name' => $request->name,
                'user_id' => $cache,
                'server_id' => $request->mcbe_server->id,
            ]);

            userEvent('mcbe.flow.player.bind.refreshed', null, $cache);

            return success($request->name);
        } else {
            return success('You are already bind.');
        }
    }

    public function is_bind(Request $request)
    {
        // 检查是否已经存在绑定
        $xuid = $request->route('xuid');

        $player = McbeFlowPlayers::where('xuid', $xuid)->first();

        $cache = cache('mcbe_flow_player_' . $xuid);

        if (is_null($player)) {
            return fail(404);
        } else {
            if (is_null($cache)) {
                return success([$player, $request->mcbe_server]);
            } else {
                if ($cache['at'] - time() < 2 && $cache['server_id'] !== $request->mcbe_server->id) {
                    return success([$player, $request->mcbe_server]);
                } else {
                    return fail(403);
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('minecraftbeflow::player.setup');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('minecraftbeflow::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('minecraftbeflow::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return Renderable
     */
    public function destroy()
    {
        McbeFlowPlayers::where('user_id', auth()->id())->delete();

        write('Your MCBE account is deleted');
        write(route('minecraftBeFlow.player'));

        return success();
    }

    public function save(Request $request)
    {
        $xuid = $request->route('xuid');
        McbeFlowPlayers::where('xuid', $xuid)->update([
            'nbt' => $request->nbt
        ]);

        $cache_key = 'mcbe_flow_player_' . $xuid;
        Cache::forget($cache_key);

        return success();
    }

    public function transfer(Request $request)
    {
        $i = 0;
        while ($i < 3) {
            $server = McbeFlowServers::where('id', '!=', $request->mcbe_server->id)
                ->where('status', 'active')
                ->where('version', $request->mcbe_server->version)
                ->where('group_id', $request->mcbe_server->group_id)
                ->select(['id', 'name', 'ip', 'port', 'motd', 'version'])
                ->first();

            if (is_null($server)) {
                break;
            }

            $cache_key = 'mcbe_flow_server_' . $server->id;
            $cache = cache($cache_key);

            if (is_null($cache)) {
                $i++;
            } else {
                return success($server);
            }
        }

        return fail();
    }

    // public function web_transfer($server_id)
    // {
    //     $server = McbeFlowServers::where('id', $server_id)->first();

    //     if (is_null($server)) {
    //         return fail();
    //     }

    //     $cache_key = 'mcbe_flow_server_' . $server->id;
    //     $cache = cache($cache_key);

    //     if (is_null($cache)) {
    //         return fail();
    //     } else {
    //         return success($server);
    //     }
    // }
}
