@extends('layouts.app')

@section('title', tr('Servers'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Servers') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="javascript: util.wings.servers.create()">{{ tr('Create Server') }}</a>
    </div>

    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Nodes') }}</th>
                    <th>{{ tr('Servers') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($servers as $server)
                    <tr id="server-{{ $server->id }}}">
                        <td nowrap>{{ $server->id }}</td>
                        <td nowrap><a href="{{ route('wings.servers.show', $server->id) }}">{{ $server->name }}</a></td>
                        <td nowrap>{{ $server->node_count }}</td>
                        <td nowrap>{{ $server->servers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
