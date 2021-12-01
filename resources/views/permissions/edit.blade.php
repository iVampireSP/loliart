@extends('layouts.app')

@section('title', tr('Role permissions'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Role permissions') }}</div>

    @can('role.edit')
        <button onclick="util.team.permission.role.givePermission('{{ $role->name }}')"
            class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Add Permission') }}</button>

        <button onclick="util.team.permission.role.delete({{ $role->id }})"
            class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Remove this role') }}</button>
    @endcan

    <ul class="mdui-list">
        @foreach ($role->permissions as $permission)
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title mdui-list-item-one-line">
                        {{ tr('Permission name: ') }}{{ $permission->name }}</div>
                    <div class="mdui-list-item-text mdui-list-item-two-line">{{ tr($permission->display_name) }}</div>
                </div>
                <a href="javascript: void(0)" mdui-tooltip="{content: '{{ tr('Delete') }}', position: 'left'}"
                    class="mdui-text-color-blue mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                    style="border-radius: 50px !important">
                    <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                </a>
            </li>
        @endforeach
    </ul>


@endsection
