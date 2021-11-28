@extends('layouts.app')

@section('title', tr('Team members of:') . $team->name)

@section('content')
    <div class="mdui-typo-display-2">{{ $team->name }}</div>
    {{-- <a onclick="util.team.create()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('New Team') }}</a> --}}

    <div id="masonry" class="mdui-row">
        <ul class="mdui-list">
            @foreach ($team->users as $user)
                {{ $user }}
            @endforeach
        </ul>

    </div>



@endsection
