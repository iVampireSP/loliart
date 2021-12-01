@extends('layouts.app')

@section('title', tr('Teams'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Manage or Switch teams') }}</div>

    <a onclick="util.team.create()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('New Team') }}</a>
    <a onclick="util.team.invitation.list()"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('My Invirations') }}</a>
    <a onclick="util.team.afk()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('AFK session') }}</a>
    <ul class="mdui-list">
        @foreach ($teams as $team)
            <a href="{{ route('teams.team.show', $team->team->id) }}">
                <li class="mdui-list-item mdui-ripple @if (session('team_id') == $team->team->id) current-team-item @endif">
                    <i class="mdui-list-item-icon mdui-icon material-icons">peoples</i>
                    <div class="mdui-list-item-content @if (session('team_id') == $team->team->id) current-team-text @endif">{{ $team->team->name }}</div>
                </li>
            </a>
        @endforeach
    </ul>

@endsection
