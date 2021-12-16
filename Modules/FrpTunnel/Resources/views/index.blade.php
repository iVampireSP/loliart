@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'Frp Tunnel')

@section('content')
    <h1 class="mdui-typo-display-1">Frp Tunnel</h1>

    <script>
        util.m()
    </script>
@endsection
