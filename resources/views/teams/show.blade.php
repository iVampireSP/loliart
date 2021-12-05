@extends('layouts.app')

@section('title', tr('Team users of:') . $team->name)

@section('content')
    @role('Super Admin')
        <div class="mdui-typo-headline-opacity">{{ tr('Super Admin') }}</div>
    @endrole

    <div class="button-group">

        @can('team.edit')
            <input class="mdui-typo-display-2 inline-edit team-inline-edit" value="{{ $team->name }}"
                onchange="util.team.edit(this.value)" mdui-tooltip="{content: '{{ tr('Click to edit.') }}'}" maxlength="25" />
            <br />
        @else
            <div class="mdui-typo-display-1 current-team-text">{{ $team->name }}</div>
        @endcan

        @can('team.edit')
            <a onclick="util.url.to(route('teams.invitations'))"
                class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Invitations') }}</a>
        @endcan

        @role('Super Admin')
            <a onclick="util.team.destroy({{ $team->id }})"
                class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Delete Team') }}</a>
        @else
            <a onclick="util.team.user.leave()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Leave Team') }}</a>
        @endrole
    </div>


    <ul class="mdui-list">
        @foreach ($team_users as $user)
            <a id="user-{{ $user->user_id }}"
                href="javascript: @can('team.edit') util.team.user.kick({{ $user->user_id }}) @else void(0) @endcan">
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
            util.event.reSubscribe(currentTeam);
            util.theme.update();
            $('#my-self-icon').remove();
            $(`#user-${user.id} li`).append(
                `<i id="my-self-icon" class="mdui-list-item-icon mdui-icon material-icons" mdui-tooltip="{content: '{{ tr('You') }}', position: 'left'}">account_circle</i>`
            );
            $(`#user-${user.id}`).attr('href', null);
        })
    </script>


@endsection
