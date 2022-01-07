@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'Tunnel Servers')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Tunnel Servers') }}</h1>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('frpTunnel.servers.create') }}">{{ tr('New Server') }}</a>
    </div>

    <div class="mdui-table-fluid frpServers">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Client Counts') }}</th>
                    <th>{{ tr('Connections') }}</th>
                    <th>{{ tr('Traffic In') }}</th>
                    <th>{{ tr('Traffic Out') }}</th>
                    <th>{{ tr('Health') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($servers as $server)
                    <tr id="item-{{ $server->id }}">
                        <td nowrap>{{ $server->id }}</td>
                        <td nowrap><a
                                href="{{ route('frpTunnel.servers.show', $server->id) }}">{{ $server->name }}</a>
                        </td>
                        @php($serverInfo = (new \Modules\FrpTunnel\Http\Controllers\FrpController($server->id))->serverInfo())
                        <td nowrap>{{ $serverInfo['client_counts'] ?? tr('Wait refresh') }}</td>
                        <td nowrap>{{ $serverInfo['cur_conns'] ?? tr('Wait refresh') }}</td>
                        <td nowrap>{{ unitConversion($serverInfo['total_traffic_in'] ?? 0 ) }}</td>
                        <td nowrap>{{ unitConversion($serverInfo['total_traffic_out'] ?? 0) }}</td>

                        <td nowrap>
                            @if (!$serverInfo)
                                <i class="mdui-icon material-icons mdui-text-color-red">close</i>
                            @else
                                <i class="mdui-icon material-icons mdui-text-color-green">done</i>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        m = {
            e: (type, data) => {
                switch (type) {
                    case 'frpServer.tunnel.server.updated':
                        util.reload('.frpServers')

                        break;
                }
            }
        }
    </script>

@endsection
