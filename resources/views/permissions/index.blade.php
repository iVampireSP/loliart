@extends('layouts.app')

@section('title', tr('Roles and Permissions'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Roles and Permissions') }}</div>

    @can('role.edit')
        <div class="mdui-tab" mdui-tab>
            <a href="#roles" class="mdui-ripple">{{ tr('Roles') }}</a>
            <a href="#users" class="mdui-ripple">{{ tr('Users') }}</a>
            <a href="#" onclick="util.url.to(route('permission.all'))" class="mdui-ripple">{{ tr('Permissions Book') }}</a>
        </div>
    @endcan
    <div id="roles" class="mdui-p-a-2">
        @can('role.edit')
            <button onclick="util.team.permission.role.create()"
                class="mdui-btn mdui-btn-outlined mdui-ripple ">{{ tr('Create Role') }}</button>
            <ul class="mdui-list">
                @foreach ($roles as $role)
                    <a href="javascript: util.url.to(route('permission.role.edit', '{{ $role->name }}'))">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons">group_work</i>
                            <div class="mdui-list-item-content">{{ $role->display_name }}</div>
                        </li>
                    </a>
                @endforeach
            @endcan

        </ul>
    </div>
    <div id="users" class="mdui-p-a-2">
        <ul class="mdui-list">
            @foreach ($users as $user)
                <a href="javascript:util.url.to(route('permission.user_role_and_permission', {{ $user->user_id }}))">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">person</i>
                        <div class="mdui-list-item-content">{{ $user->user->name }}</div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>

@endsection
