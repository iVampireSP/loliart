@extends('layouts.app')

@section('title', tr('Roles and Permissions'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Roles and Permissions') }}</div>

    @can('role.edit')
        <div class="mdui-tab" mdui-tab>
            <a href="#roles" class="mdui-ripple">{{ tr('Roles') }}</a>
            <a href="#permissions" class="mdui-ripple">{{ tr('User Permissions') }}</a>
            <a href="#" onclick="util.url.to(route('permission.all'))" class="mdui-ripple">{{ tr('Permissions Book') }}</a>
        </div>
    @endcan
    <div id="roles" class="mdui-p-a-2">
        @can('role.create')
            <button onclick="util.team.permission.role.create()"
                class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Create Role') }}</button>
            <ul class="mdui-list">
                @foreach ($roles as $role)
                    <a @can('role.edit')
                    href="javascript: util.url.to(route('permission.role.edit', '{{ $role->name }}')) @else 'javascript:void(0)' @endcan">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">policy</i>
                        <div class="mdui-list-item-content">{{ $role->display_name }}</div>
                    </li>
                </a>

            @endforeach
        @endcan

    </ul>
</div>
<div id="permissions" class="mdui-p-a-2">
    <ul class="mdui-list">
        @foreach ($permissions as $permission)
            <li class="mdui-list-item mdui-ripple" @can('role.delete') can-delete="true" @endcan>
                <i class="mdui-list-item-icon mdui-icon material-icons">policy</i>
                <div class="mdui-list-item-content">{{ $permission }}</div>
            </li>
        @endforeach
    </ul>
</div>

@endsection
