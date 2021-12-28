<?php

namespace Modules\FrpTunnel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\FrpTunnel\Entities\FrpServer;
use Modules\FrpTunnel\Entities\FrpTunnel;

class TunnelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tunnels = FrpTunnel::where('team_id', session('team_id'))->with(['server' => function ($query) {
            $query->select(['name', 'id', 'server_address', 'token', 'server_port']);
        }])->simplePaginate(10);
        return view('frptunnel::tunnels.index', compact('tunnels'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $servers = FrpServer::where('team_id', session('team_id'))->get();
        if ($servers->isEmpty()) {
            return view('frptunnel::servers.create', compact('servers'));
        }
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

        if (!strpos($request->local_address, ':')) {
            write('Local address must contain port.');
            return response()->json(['status', 0]);
        }

        $server = FrpServer::find($request->server_id);
        if (is_null($server)) {
            write('Server not found.');
            return response()->json(['status', 0], 404);
        }

        if ($request->protocol == 'http' || $request->protocol == 'https') {
            $request->remote_port = 0;
            $request->validate([
                "custom_domain" => 'required|unique:frp_tunnels,custom_domain',
            ]);

            $request->custom_domain = strtolower($request->custom_domain);

            if (str_contains($request->custom_domain, ',')) {
                write('Only support one domain per request');
                return response()->json(['status' => 0]);
            }
        } elseif ($request->protocol == 'tcp' || $request->protocol == 'udp') {
            $request->custom_domain = null;
            $request->validate([
                "remote_port" => "required|integer|max:$server->max_port|min:$server->min_port|bail",
            ]);

            if ($request->remote_port == $server->server_port || $request->remote_port == $server->dashboard_port) {
                write('The remote port cannot be used.');
            }

            $remote_port_search = FrpTunnel::where('server_id', $server->id)->where('remote_port', $request->remote_port)->where('protocol', strtolower($request->protocol))->exists();
            if ($remote_port_search) {
                write('The remote port is already in use.');
                return response()->json(['status', 0]);
            }

        } else if ($request->protocol == 'stcp') {
            $request->custom_domain = null;
            $request->remote_port = null;

            $request->validate(["sk" => 'required|alpha_dash|min:3|max:15']);

        } else {
            write('Unsupported protocol.');
            return response()->json(['status' => 0]);
        }

        $data = $request->toArray();
        $data['protocol'] = strtolower($data['protocol']);

        $test_protocol = 'allow_' . $data['protocol'];

        if (!$server->$test_protocol) {
            write('The protocol is not allowed by the server.');
            return response()->json(['status' => 0]);
        }

        $data['client_token'] = Str::random(50);
        $data['team_id'] = session('team_id');

        $tunnel = FrpTunnel::create($data);

        write(route('frpTunnel.tunnels.show', $tunnel->id));
        writeTeam('FrpTunnel ' . $request->name . ' created.');
        return response()->json(['status' => 1]);
    }

    /**
     * Show the specified resource.
     * @param FrpTunnel $tunnel
     * @return Renderable
     */
    public function show(FrpTunnel $tunnel)
    {
        userInTeamFail($tunnel->team_id);
        $tunnel->load(['team', 'server' => function ($query) {
            $query->select(['name', 'id', 'server_address', 'token', 'server_port']);
        }]);
        $servers = FrpServer::where('team_id', session('team_id'))->get();
        return view('frptunnel::tunnels.show', compact('servers', 'tunnel'));
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
     * @param FrpTunnel $tunnel
     * @return Renderable
     */
    public function update(Request $request, FrpTunnel $tunnel)
    {
        if (!strpos($request->local_address, ':')) {
            write('Local address must contain port.');
            return response()->json(['status', 0]);
        }

        userInTeamFail($tunnel->team_id);

        $request->validate([
            'name' => 'required',
            'protocol' => 'required',
            'local_address' => 'required',
            'server_id' => 'required',
        ]);

        $server = FrpServer::find($request->server_id);
        if (is_null($server)) {
            write('Server not found.');
            return response()->json(['status', 0], 404);
        }

        $data = $request->toArray();

        if ($request->protocol == 'http' || $request->protocol == 'https') {
            $data['remote_port'] = 0;
            $request->validate([
                "custom_domain" => ['required', Rule::unique('frp_tunnels')->ignore($tunnel->id)],
            ]);

            if (str_contains($request->custom_domain, ',')) {
                write('Only support one domain per request');
                return response()->json(['status' => 0]);
            }
        } elseif ($request->protocol == 'tcp' || $request->protocol == 'udp') {
            $request->validate([
                "remote_port" => "required|integer|max:$server->max_port|min:$server->min_port|bail",
            ]);

            if ($request->remote_port == $server->server_port || $request->remote_port == $server->dashboard_port) {
                write('The remote port cannot be used.');
            }

            $remote_port_search = FrpTunnel::where('server_id', $server->id)->where('remote_port', $request->remote_port)->where('protocol', strtolower($request->protocol))->first();
            if ($remote_port_search->id !== $tunnel->id) {
                write('The remote port is already in use.');
                return response()->json(['status', 0]);
            }

        } else if ($request->protocol == 'stcp') {
            $request->validate([
                "sk" => 'required|alpha_dash|min:3|max:15',
            ]);
        } else {
            write('Unsupported protocol.');
            return response()->json(['status' => 0]);
        }

        $data['protocol'] = strtolower($data['protocol']);

        $test_protocol = 'allow_' . $data['protocol'];

        if (!$server->$test_protocol) {
            write('The protocol is not allowed by the server.');
            return response()->json(['status' => 0]);
        }

        if ($request->reset_token) {
            $data['client_token'] = Str::random(50);
        }

        $data['local_address'] = trim($data['local_address']);
        $data['team_id'] = session('team_id');

        $tunnel->update($data);

        writeTeam('FrpTunnel ' . $request->name . ' updated.');
        return response()->json(['status' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     * @param FrpTunnel $tunnel
     * @return Renderable
     */
    public function destroy(FrpTunnel $tunnel)
    {
        userInTeamFail($tunnel->team_id);

        $tunnel->delete();

        write(route('frpTunnel.tunnels.index'));
        writeTeam('FrpTunnel ' . $tunnel->name . ' deleted.');
        return response()->json(['status' => 1]);
    }
}
