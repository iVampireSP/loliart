@extends('layouts.app')

@section('title', tr('Team users of:') . $team->name)

@section('content')
    @can('Super Admin')
        <div class="mdui-typo-headline-opacity">{{ tr('Super Admin') }}</div>
    @endcan
    <div class="mdui-typo-display-2">{{ $team->name }}</div>
    <a onclick="util.url.to(route('teams.invitations'))"
        class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Invitations') }}</a>
    <div id="masonry" class="mdui-row">
        <ul class="mdui-list">
            @foreach ($team->users as $user)
                {{ $user->name }}
            @endforeach
        </ul>

    </div>



@endsection
