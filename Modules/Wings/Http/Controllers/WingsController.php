<?php

namespace Modules\Wings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class WingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $panel = new PanelController();
        /**
         * {
  "name": "Test Renamed",
  "description": "Test",
  "location_id": 1,
  "fqdn": "pterodactyl.file.properties",
  "scheme": "https",
  "behind_proxy": false,
  "maintenance_mode": false,
  "memory": 2048,
  "memory_overallocate": 0,
  "disk": 5000,
  "disk_overallocate": 0,
  "upload_size": 100,
  "daemon_sftp": 2022,
  "daemon_listen": 8080
}
         */
        $data = json_decode('{
"type": "update",
"team_id": 56,
"name": "test11",
"description": "123",
"display_name": "123",
"location_id": 68,
"fqdn": "nat.nwl.im",
"scheme": "https",
"memory": "1024",
"memory_overallocate": "0",
"disk": "10240",
"disk_overallocate": "0",
"upload_size": "100",
"daemon_sftp": "2022",
"daemon_listen": "8080",
"visibility": 0,
"behind_proxy": 0
}', true);
        // dd($data);
        // $panel->updateNode(17, $data);
        return view('wings::index');
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
        return view('wings::show');
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