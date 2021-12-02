{{-- @extends('playlist::layouts.master') --}}

@section('app-menu')
    @include('playlist::layouts.menu')
@endsection

@extends('layouts.app')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('playlist.name') !!}
    </p>
@endsection
