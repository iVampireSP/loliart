@extends('layouts.app')

@section('title', tr('New Node'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('New Node') }}</div>


@endsection
