@extends('layouts.app')

@section('title', tr('Team users of:') . $team->name)

@section('content')
    @can('Super Admin')
        <div class="mdui-typo-headline-opacity">{{ tr('Super Admin') }}</div>
    @endcan
    <input class="mdui-typo-display-2 inline-edit" value="{{ $team->name }}" onchange="util.team.edit(this)" />
    <br />
    <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Invitations') }}</a>

    <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Edit Team') }}</a>

    <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Delete Team') }}</a>

    <ul class="mdui-list">
        @foreach ($team_users as $user)
            <a href="{{ route('teams.team.show', $user->user_id) }}">
                <li class="mdui-list-item mdui-ripple">
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
            window.team = {!! $team !!};
            util.theme.update()
        })
    </script>


@endsection
