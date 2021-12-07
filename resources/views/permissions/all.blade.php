@extends('layouts.app')

@section('title', tr('All permissions'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('All permissions') }}</div>

    <ul class="mdui-list">
        <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">
                group_work
            </i>
            <div class="mdui-list-item-content">
                <div class="mdui-list-item-title mdui-list-item-one-line">
                    {{ tr('Role name: ') }}Super Admin</div>
                <div class="mdui-list-item-text mdui-list-item-two-line">{{ tr('Team super admin.') }}</div>
            </div>
        </li>
        @foreach ($permissions as $permission)
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    shield
                </i>
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title mdui-list-item-one-line">
                        {{ tr('Permission name: ') }}{{ $permission->name }}</div>
                    <div class="mdui-list-item-text mdui-list-item-two-line">{{ tr($permission->display_name) }}</div>
                </div>
            </li>
        @endforeach
    </ul>


@endsection
