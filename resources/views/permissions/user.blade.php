@extends('layouts.app')

@section('title', $user->name . tr('\'s role and permissions'))

@section('content')
    <div class="mdui-typo-display-1">{{ $user->name . tr('\'s role and permissions') }}</div>

    <a onclick="util.team.permission.role.assignRole({{ $user->id }})"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Assign a role') }}</a>
    <a onclick="util.team.permission.role.givePermissionToUser({{ $user->id }})"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Give permission') }}</a>

    <br />
    <br />
    <div class="mdui-typo-display-1">{{ tr('Roles') }}</div>
    <ul class="mdui-list">
        @foreach ($roles as $role)
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">{{ $role }}</div>
                <a href="javascript: util.team.permission.role.revokeRoleFromUser({{ $user->id }},'{{ $role }}')"
                    mdui-tooltip="{content: '{{ tr('Delete') }}', position: 'left'}"
                    class="mdui-text-color-blue mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                    style="border-radius: 50px !important">
                    <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                </a>
            </li>
        @endforeach

    </ul>

    <div class="mdui-typo-display-1">{{ tr('Permissions') }}</div>
    <ul class="mdui-list">
        @foreach ($permissions as $permission)
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">{{ $permission->name }}</div>
                <a href="javascript: util.team.permission.role.revokePermissionFromUser({{ $user->id }},{{ $permission->id }})"
                    mdui-tooltip="{content: '{{ tr('Delete') }}', position: 'left'}"
                    class="mdui-text-color-blue mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                    style="border-radius: 50px !important">
                    <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                </a>
            </li>
        @endforeach

    </ul>


@endsection
