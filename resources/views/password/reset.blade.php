@extends('layouts.app')

@section('title', 'Password')

@section('content')
    <div class="mdui-typo-display-2">{{ __('Setting up your password.') }}</div>

    <form method="POST" action="{{ route('password.setup_password') }}">
        @csrf
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ __('Your new password.') }}</label>
            <input class="mdui-textfield-input" type="password" name="password" />
        </div>

        <button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">Next</button>
    </form>


@endsection
