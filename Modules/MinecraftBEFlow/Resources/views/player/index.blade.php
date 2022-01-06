@extends('layouts.app')

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('title', tr('Hi') . $player->name)

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Hi') }}, {{ $player->name }}</h1>

    <p>你加入的时间: {{ $player->created_at }}</p>

@endsection
