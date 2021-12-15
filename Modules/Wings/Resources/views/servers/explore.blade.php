@extends('layouts.app')

@section('title', tr('Explore Server'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Explore server') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('wings.servers.index') }}">{{ tr('My Server') }}</a>
    </div>

    <div class="pages">
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Node') }}</th>
                        <th>{{ tr('Owner') }}</th>
                    </tr>
                </thead>
                <tbody class="mdui-typo">
                    @foreach ($servers as $server)
                        <tr id="server-{{ $server->id }}}">
                            <td nowrap>{{ $server->id }}</td>
                            <td nowrap><a
                                    href="{{ route('wings.servers.show', $server->id) }}">{{ $server->display_name }}</a>
                            </td>
                            <td nowrap>{{ $server->node->display_name }}</td>
                            <td nowrap>{{ $server->account->username ?? tr('User not exists') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $servers->links() }}

@endsection
