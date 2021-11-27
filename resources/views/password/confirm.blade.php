@extends('layouts.app')

@section('title', tr('Confirm password'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Confirm your password to continue.') }}</div>

    <form method="POST" action="{{ route('password.confirm_password') }}">
        @csrf
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Your password') }}</label>
            <input class="mdui-textfield-input" type="password" name="password" />
        </div>

        <button type="submit"
            class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Go on') }}</button>
    </form>


@endsection
