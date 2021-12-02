@extends('layouts.app')

@section('app-menu')
    @include('playlist::layouts.menu')
@endsection

@section('title', tr('Play list'))

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('playlist.name') !!}
    </p>

    <audio src="http://music.163.com/song/media/outer/url?id=317151.mp3" controls preload="auto"></audio>
@endsection
