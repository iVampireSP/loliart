@extends('layouts.app')

@section('title', tr('All permissions'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('All permissions') }}</div>

    <ul class="mdui-list">
        @foreach ($permissions as $permission)
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title mdui-list-item-one-line">
                        {{ tr('Permission name: ') }}{{ $permission->name }}</div>
                    <div class="mdui-list-item-text mdui-list-item-two-line">{{ tr($permission->display_name) }}</div>
                </div>
            </li>
        @endforeach
    </ul>


@endsection
