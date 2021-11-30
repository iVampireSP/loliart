@extends('layouts.app')

@section('title', tr('Confirm password'))

@section('content')
    <p class="mdui-text-center material-icons mdui-icon mdui-typo-display-1-opacity"
        style="font-size: 10rem;width: 100%;margin:0;margin-top:-50px">
        password</p>

    <div class="mdui-typo-display-1 mdui-text-center">{{ tr('You must provid password to continue') }}</div>
    <p class="mdui-text-center">
        {{ tr('You are doing a dangerous action, for security reasons, please provid your password to continue.') }}</p>

    <form method="POST" action="{{ route('password.confirm_password') }}" class="mdui-text-center">
        @csrf
        <div class="mdui-textfield mdui-m-b-2 @error('password') mdui-textfield-invalid @enderror">
            <input class="mdui-textfield-input mdui-text-center" type="password" name="password"
                placeholder="{{ tr('Your password') }}" />
            @error('password')
                <div class="mdui-textfield-error" style="width: 100%;">{{ tr($message) }}</div>
            @enderror
        </div>

        <button type="submit"
            class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Go on') }}</button>

    </form>

@endsection
