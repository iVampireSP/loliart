@extends('layouts.app')

@section('title', tr('Servers'))

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Servers') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('minecraftBeFlow.servers.create') }}">{{ tr('Create Server') }}</a>

        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('minecraftBeFlow.servers.index') }}">{{ tr('All Servers') }}</a>
    </div>

    <div class="pages">
        <div class="servers">
            <div class="mdui-table-fluid">
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ tr('Name') }}</th>
                            <th>IP Port</th>
                            <th>{{ tr('Online Players') }}</th>
                            <th>{{ tr('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="mdui-typo">
                        @foreach ($servers as $server)
                            <tr id="server-{{ $server->id }}">
                                <td nowrap>{{ $server->id }}</td>
                                <td nowrap><a
                                        href="{{ route('minecraftBeFlow.servers.show', $server->id) }}">{{ $server->name }}</a>
                                </td>
                                <td nowrap><a
                                        href="minecraft://?addExternalServer={{ $server->name }}|{{ ipPort($server->ip, $server->port) }}">{{ ipPort($server->ip, $server->port) }}</a>
                                </td>
                                @php($cache = cache('mcbe_flow_server_' . $server->id, 0))
                                <td nowrap>{{ $cache['players_count'] ?? 0 }}</td>
                                <td nowrap>
                                    @if ($cache)
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
        </div>

        {{ $servers->links() }}
    </div>

    <script>
        m = {
            e: (type, data) => {
                switch (type) {
                    case 'minecraftBeFlow.server.list.updated':
                        util.reload('.servers')

                        break;
                }
            },
        }
    </script>

@endsection
