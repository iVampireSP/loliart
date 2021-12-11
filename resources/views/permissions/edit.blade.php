@extends('layouts.app')

@section('title', tr('Role permissions'))

@section('content')
    <div class="mdui-typo-display-1 mdui-m-b-2">{{ tr('Role permissions') }}</div>

    <x-lock for="role-permissions" />

    <div data-lock-form="role-permissions">
        @can('role.edit')
            <button onclick="util.team.permission.role.givePermission('{{ $role->name }}')"
                class="mdui-btn mdui-btn-outlined mdui-ripple ">{{ tr('Add Permission') }}</button>

            <button onclick="util.team.permission.role.delete({{ $role->id }})"
                class="mdui-btn mdui-btn-outlined mdui-ripple ">{{ tr('Remove this role') }}</button>
        @endcan

        <ul class="mdui-list">
            @foreach ($role->permissions as $permission)
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">group_work</i>
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title mdui-list-item-one-line">
                            <span class="mdui-hidden-sm-down">{{ tr('Permission name: ') }}</span>{{ $permission->name }}
                        </div>
                    </div>
                    <a href="javascript: util.team.permission.role.removePermission({{ $role->id }}, '{{ $permission->name }}')"
                        mdui-tooltip="{content: '{{ tr('Delete') }}', position: 'left'}"
                        class="mdui-text-color-blue mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                        style="border-radius: 50px !important">
                        <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                    </a>
                </li>
            @endforeach
        </ul>

    </div>

@endsection
