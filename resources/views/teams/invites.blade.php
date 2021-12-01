@extends('layouts.app')

@section('title', tr('Invirations'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Invirations') }}</div>

    <a onclick="util.team.user.invite()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Invite User') }}</a>
    <ul class="mdui-list">

        @foreach ($invitations as $invitation)

            <li class="mdui-list-item mdui-ripple" @can('team.invitations.delete')
                onclick="util.team.user.deleteInvitation({{ $invitation->id }})" @endcan>
                <div class="mdui-list-item-avatar">
                    <img src="{{ avatar($invitation->user->email) }}" />
                </div>
                <div class="mdui-list-item-content">{{ $invitation->user->name }}</div>
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    @if (is_null($invitation->agree_at))
                        query_builder
                    @else
                        check_circle
                    @endif
                </i>
            </li>

        @endforeach

    </ul>


@endsection
