@extends('layouts.app')

@section('title', $egg->name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-headline">{{ $egg->name }}</div>
    <div class="mdui-typo-body-1">{{ $egg->description }}</div>



@endsection
