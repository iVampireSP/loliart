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

    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Tunnels') }}</th>
                    <th>{{ tr('Traffic In') }}</th>
                    <th>{{ tr('Traffic Out') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($servers as $server)
                    <tr id="item-{{ $server->id }}}">
                        <td nowrap>{{ $server->id }}</td>
                        <td nowrap><a href="{{ route('frpTunnel.servers.show', $server->id) }}">{{ $server->name }}</a>
                        </td>
                        <td nowrap>{{ $server->tunnels }}</td>
                        <td nowrap>0</td>
                        <td nowrap>0</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
