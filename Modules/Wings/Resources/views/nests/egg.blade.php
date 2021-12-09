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
    <div class="mdui-typo-display-1">{{ $egg->name }}</div>

    <div class="mdui-typo-body-1">{{ tr($egg->description) }}</div>

    <div class="mdui-typo-headline mdui-m-t-3">{{ tr('Variables') }}</div>
    <div class="mdui-row masonry">
        @foreach ($egg->environment as $env)
            @php($env = $env->attributes)
            @if ($env->user_viewable)
                <div class="mdui-col-xs-12 mdui-col-sm-4 mdui-m-t-1">
                    <div class="mdui-card">
                        <div class="mdui-card-primary">
                            <div class="mdui-card-primary-title">{{ tr($env->name) }}</div>
                            <div class="mdui-card-primary-subtitle">{{ tr($env->description) }}</div>
                        </div>
                        <div class="mdui-card-content">
                            <div class="mdui-textfield @if (!is_null($env->default_value)) mdui-textfield-floating-label @endif">
                                <label class="mdui-textfield-label">{{ tr($env->name) }}</label>
                                <input class="mdui-textfield-input" name="{{ $env->env_variable }}"
                                    value="{{ $env->default_value }}" type="text" @if (!$env->user_editable) readonly @endif />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
