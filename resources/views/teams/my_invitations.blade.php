@extends('layouts.app')

@section('title', tr('Your Invirations'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Your Invirations') }}</div>

    <ul class="mdui-list">
        @foreach ($invitations as $invitation)
            <li class="mdui-list-item mdui-ripple" @can('team.edit')
                onclick="util.team.user.deleteInvitation({{ $invitation->id }})" @endcan>
                <i class="mdui-list-item-icon mdui-icon material-icons">peoples</i>
                <div class="mdui-list-item-content">{{ $invitation->team->name }}</div>

                @if (is_null($invitation->agree_at))
                    <a href="javascript: util.team.invitation.reject({{ $invitation->id }})"
                        mdui-tooltip="{content: '{{ tr('Deny') }}', position: 'left'}"
                        class="mdui-text-color-red mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                        style="border-radius: 50px !important">
                        <i class="mdui-list-item-icon mdui-icon material-icons">highlight_off</i>
                    </a>
                    <a href="javascript: util.team.invitation.agree({{ $invitation->id }})"
                        mdui-tooltip="{content: '{{ tr('Accept') }}', position: 'right'}"
                        class="mdui-text-color-blue mdui-btn mdui-btn-icon mdui-ripple mdui-m-r-1"
                        style="border-radius: 50px !important">
                        <i class="mdui-list-item-icon mdui-icon material-icons">check_circle_outline</i>
                    </a>
                @else
                    <i class="mdui-text-color-green mdui-list-item-icon mdui-icon material-icons"
                        mdui-tooltip="{content: '{{ tr('Accepted') }}', position: 'left'}">check_circle</i>
                @endif


            </li>
        @endforeach
    </ul>

@endsection
