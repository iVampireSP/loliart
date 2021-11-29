@extends('layouts.app')

@section('title', tr('Your Permissions'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Your Permissions') }}</div>

    <ul class="mdui-list">
        @foreach ($permissions as $permission)
            <a href="#">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">policy</i>
                    <div class="mdui-list-item-content">{{ $permission }}</div>
                </li>
            </a>
        @endforeach
    </ul>


@endsection
