@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'Tunnel Servers')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Tunnel Servers') }}</h1>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('frpTunnel.servers.create') }}">{{ tr('New Server') }}</a>
    </div>

@endsection
