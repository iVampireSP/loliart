@extends('layouts.app')

@section('title', 'Egg: ' . $egg->name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    @if (!$egg->can_use)
        <div class="mdui-chip">
            <span class="mdui-chip-icon mdui-color-blue">
                <i class="mdui-icon material-icons">error</i>
            </span>
            <span class="mdui-chip-title">{{ tr('This egg is temporarily unavailable.') }}</span>
        </div>
    @endif
    <div class="mdui-typo-headline">{{ $egg->name }}</div>
    <div class="mdui-typo-body-1">{{ tr($egg->description) }}</div>

@endsection
