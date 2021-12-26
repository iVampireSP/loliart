@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'Tunnel Servers')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Tunnel Servers') }}</h1>

    <script>
        util.m()
    </script>
@endsection
