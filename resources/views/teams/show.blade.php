@extends('layouts.app')

@section('title', tr('Team users of:') . $team->name)

@section('content')
    @can('Super Admin')
        <div class="mdui-typo-headline-opacity">{{ tr('Super Admin') }}</div>
    @endcan

    @can('team.update')
        <input class="mdui-typo-display-2 inline-edit team-inline-edit" value="{{ $team->name }}"
            onchange="util.team.edit(this.value)" mdui-tooltip="{content: '{{ tr('Click to edit.') }}'}" maxlength="25" />
        <br />
    @else
        <div class="mdui-typo-display-1 current-team-text">{{ $team->name }}</div>
    @endcan

    <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Invitations') }}</a>

    {{-- <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Edit Team') }}</a> --}}

    <a onclick="util.team.destroy({{ $team->id }})"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Delete Team') }}</a>

    <ul class="mdui-list">
        @foreach ($team_users as $user)
            <a href="javascript: util.team.user.kick({{ $user->user_id }})">
                <li class=" mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-avatar">
                        <img src="{{ avatar($user->user->email) }}" />
                    </div>
                    <div class="mdui-list-item-content">{{ $user->user->name }}</div>
                </li>
            </a>
        @endforeach
    </ul>


    <script>
        $(() => {
            let currentTeam = {!! $team !!};
            util.event.reSubscribe(currentTeam)
            util.theme.update()
        })
    </script>


@endsection
