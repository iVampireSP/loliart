<?php

namespace Modules\Wings\Http\Controllers;

use App\Events\TeamEvent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsLocation;
use Modules\Wings\Events\LocationsEvent;
use Modules\Wings\Jobs\LocationJob;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $locations = WingsLocation::where('team_id', session('team_id'))->get();
        return view('wings::locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // return view('wings::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, WingsLocation $wingsLocation)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $short = 'art.' . time() . '.' . auth()->id() . '.' . session('team_id');

        $wingsLocation->name = $request->name;
        $wingsLocation->short = $short;
        $wingsLocation->team_id = session('team_id');
        $wingsLocation->save();

        broadcast(new TeamEvent(
            session('team_id'),
            [
                'type' => 'wings.locations.pending',
                'data' => $wingsLocation->id,
                'status' => 'pending'
            ]
        ));

        dispatch(new LocationJob([
            'type' => 'create',
            'name' => $request->name,
            'short' => $short,
            'id' => $wingsLocation->id,
            'team_id' => session('team_id'),
        ]));

        return response()->json(['status' => 1, 'data' => $wingsLocation->id]);
    }

    /**
     * Show the specified resource.
     * @param WingsLocation $location
     * @return Renderable
     */
    public function show(WingsLocation $location)
    {
        if (session('team_id') != $location->team_id) {
            abort(404);
        }

        return view('wings::locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // return view('wings::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param WingsLocation $location
     * @return Renderable
     */
    public function update(Request $request, WingsLocation $location)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        if (session('team_id') != $location->team_id) {
            response()->json(['status' => 0], 403);
        }

        $location->name = $request->name;
        $location->save();

        broadcast(new TeamEvent(
            session('team_id'),
            [
                'type' => 'wings.locations.renamed',
                'data' => $request->name,
                'status' => 'pending'
            ]
        ))->toOthers();

        return response()->json(['status' => 1, 'data' => $request->name]);
    }

    /**
     * Remove the specified resource from storage.
     * @param WingsLocation $location
     * @return Renderable
     */
    public function destroy(WingsLocation $location)
    {
        if (session('team_id') != $location->team_id) {
            response()->json(['status' => 0], 403);
        }

        $location->status = 'deleting';
        $location->save();

        broadcast(new TeamEvent(
            session('team_id'),
            [
                'type' => 'wings.locations.pending',
                'data' => $location->id,
                'status' => 'pending'
            ]
        ));

        dispatch(new LocationJob([
            'type' => 'delete',
            'location' => $location->location_id,
            'team_id' => session('team_id'),
            'id' => $location->id
        ]));

        return response()->json(['status' => 1, 'data' => 'pending'], 200);
    }
}