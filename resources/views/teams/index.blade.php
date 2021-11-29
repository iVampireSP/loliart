@extends('layouts.app')

@section('title', tr('Teams'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Manage or Switch teams') }}</div>

    <a onclick="util.team.create()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('New Team') }}</a>
    <div id="masonry" class="mdui-row">
        <ul class="mdui-list">
            @foreach ($teams as $team)
                <a href="{{ route('teams.team.show', $team->id) }}">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons">peoples</i>
                        <div class="mdui-list-item-content">{{ $team->name }}</div>
                    </li>
                </a>
            @endforeach
        </ul>

    </div>



@endsection