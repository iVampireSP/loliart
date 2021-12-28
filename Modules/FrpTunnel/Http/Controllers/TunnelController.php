<?php

namespace Modules\FrpTunnel\Http\Controllers;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\FrpTunnel\Entities\FrpServer;
use Modules\FrpTunnel\Entities\FrpTunnel;
use Illuminate\Contracts\Support\Renderable;

class TunnelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('frptunnel::tunnels.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $servers = FrpServer::where('team_id', session('team_id'))->get();
        return view('frptunnel::tunnels.create', compact('servers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'protocol' => 'required',
            'local_address' => 'required',
            'server_id' => 'required',
        ]);

        if ($request->protocol == 'http' || $request->protocol == 'https') {
            $request->remote_port = 0;
            $request->validate([
                "custom_domain" => 'required',
            ]);

            if (str_contains($request->custom_domain, ',')) {
                write('Only support one domain per request');
                return response()->json(['status' => 0]);
            }
        } elseif ($request->protocol == 'tcp' || $request->protocol == 'udp') {
            $request->custom_domain = null;
            $request->validate([
                "remote_port" => 'required',
            ]);

            if ($request->remote_port < 1025 || $request->remote_port >= 65535) {
                write('The port must be between 1025 and 65535');
                return response()->json(['status' => 0]);
            }
        } else if ($request->protocol == 'xtcp') {
            $request->custom_domain = null;
            $request->remote_port = null;

            $this->validate($request, array(
                "sk" => 'required|alpha_dash|min:3|max:15',
            ));
        } else {
            write('Unsupported protocol.');
            return response()->json(['status' => 0]);
        }

        $data = $request->toArray();

        $data['client_token'] = Uuid::uuid6()->toString();
        $data['team_id'] = session('team_id');

        FrpTunnel::create($data);

        // write(route());
        writeTeam('FrpTunnel ' . $request->name . ' created.');
        return response()->json(['status' => 1]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frptunnel::tunnels.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frptunnel::tunnels.edit');
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
