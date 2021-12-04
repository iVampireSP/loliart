@extends('layouts.app')

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('title', tr('Wings'))

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('wings.name') !!}
    </p>
@endsection
