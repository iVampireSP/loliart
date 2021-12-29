@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'Tunnels')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Tunnel') }}</h1>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('frpTunnel.tunnels.create') }}">{{ tr('New Tunnel') }}</a>
    </div>

    <div class="pages">
        <div class="mdui-table-fluid frpTunnels">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Protocol') }}</th>
                        <th>{{ tr('Local Address') }}</th>
                        <th>{{ tr('Remote Address or Domain') }}</th>
                        <th>{{ tr('Online') }}</th>
                    </tr>
                </thead>
                <tbody class="mdui-typo">
                    @foreach ($tunnels as $tunnel)
                        <tr id="item-{{ $tunnel->id }}}">
                            <td>{{ $tunnel->id }}</td>
                            <td><a href="{{ route('frpTunnel.tunnels.show', $tunnel->id) }}">{{ $tunnel->name }}</a>
                            </td>
                            <td>{{ Str::upper($tunnel->protocol) }}</td>
                            @php($cache = Cache::get('frpTunnel_data_' . $tunnel->client_token, []))

                            <td>{{ $tunnel->local_address }}</td>
                            @if ($tunnel->protocol == 'http' || $tunnel->protocol == 'https')
                                <td>{{ $tunnel->custom_domain }}</td>
                            @else
                                <td>{{ $tunnel->server->server_address . ':' . $tunnel->remote_port }}</td>
                            @endif

                            <td>
                                @if ($cache['status'] ?? false === 'online')
                                    <i class="mdui-icon material-icons mdui-text-color-green">done</i>
                                @else
                                    <i class="mdui-icon material-icons mdui-text-color-red">close</i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $tunnels->links() }}
    </div>

    <script>
        m = {
            e: (type, data) => {
                switch (type) {
                    case 'frpServer.tunnels.updated':
                        util.reload('.frpTunnels')

                        break;
                }
            }
        }
    </script>

@endsection
