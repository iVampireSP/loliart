@extends('layouts.app')

@section('title', $server->display_name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $server->display_name }}</div>
    @if ($server->status != 'created')
        <div class="logger">
            <span>Listening event.</span>
        </div>
        <button class="mdui-btn mdui-btn-outlined" onclick="util.reload()">{{ tr('Reload') }}</button>
    @endif
@endsection
