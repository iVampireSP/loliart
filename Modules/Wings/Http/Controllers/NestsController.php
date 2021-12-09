<?php

namespace Modules\Wings\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsNest;
use Modules\Wings\Entities\WingsNestEgg;

class NestsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(WingsNest $nest)
    {
        $nests = $nest->where('display', 1)->where('found', 1)->get();
        return view('wings::nests.index', compact('nests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('wings::create');
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
        $nest = WingsNest::with('eggsList')->where('id', $id)->where('display', 1)->where('found', 1)->firstOrFail();
        return view('wings::nests.show', compact('nest'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('wings::edit');
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