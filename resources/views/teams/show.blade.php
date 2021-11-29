@extends('layouts.app')

@section('title', tr('Team users of:') . $team->name)

@section('content')
    <div class="mdui-typo-display-2">{{ $team->name }}</div>
    {{ session()->get('team_id') }}

    {{-- @role('writer')
        我是一个 writer!
    @else
        我不是一个 writer...
    @endrole --}}

    {{-- <a onclick="util.team.create()" class="mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('New Team') }}</a> --}}


    <div id="masonry" class="mdui-row">
        <ul class="mdui-list">
            @foreach ($team->users as $user)
                {{ $user }}
            @endforeach
        </ul>

    </div>



@endsection
