@extends('layouts.app')

@section('title', tr('Teams'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Manage or Switch teams') }}</div>

    <div class="button-group">
        <a onclick="util.team.create()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('New Team') }}</a>
        <a onclick="util.team.invitation.list()"
            class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('My Invirations') }}</a>
        <a onclick="util.team.afk()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('AFK session') }}</a>
    </div>
    <ul class="mdui-list">
        @foreach ($teams as $team)
            <a href="{{ route('teams.team.show', $team->team->id) }}" id="team-{{ $team->team_id }}">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">peoples</i>
                    <div class="mdui-list-item-content">{{ $team->team->name }}</div>
                </li>
            </a>
        @endforeach

        <script>
            $(() => {
                if (team != null) {
                    $('#team-' + team.id + ' li').addClass('current-team-item')
                    $('#team-' + team.id + ' li div').addClass('current-team-text')
                }
            })
        </script>
    </ul>

@endsection
