<?php

namespace Modules\MinecraftBEFlow\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\MinecraftBEFlow\Entities\McbeFlowPlayers;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (McbeFlowPlayers::where('user_id', auth()->id())->exists()) {
            return view('minecraftbeflow::player.index');
        } else {
            $cache_key = 'mcbe_flow_player_bind_' . auth()->id();
            $cache = cache($cache_key);
            if (is_null($cache)) {
                $random = Str::random(10);
                cache(['mcbe_flow_player_bind_' . auth()->id() => $random], 600);
                userEvent('mcbe.flow.player.bind.refreshed');

            } else {
                $random = cache($cache_key);
            }

            return view('minecraftbeflow::player.setup', compact('random'));
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
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
