@extends('layouts.app')

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('title', 'Wings')

@section('content')
    <h1 class="mdui-typo-display-1">Pterodactyl Wings</h1>

    <script>
        util.m()
    </script>
@endsection
