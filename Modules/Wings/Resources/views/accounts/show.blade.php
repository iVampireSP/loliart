@extends('layouts.app')

@section('title', $user->username)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $user->username }}</div>

    <form action="#" id="new" class="mdui-m-t-5" onsubmit="event.preventDefault();util.wings.accounts.edit($(this))">

        <div class="mdui-textfield">
            <label class="mdui-textfield-label">{{ tr('Username') }}</label>
            <input class="mdui-textfield-input" type="text" name="username" value="{{ $user->username }}" />
            <div class="mdui-textfield-helper">{{ tr('Username should be unique.') }}</div>
        </div>

        <div class="mdui-textfield">
            <label class="mdui-textfield-label">{{ tr('Email') }}</label>
            <input class="mdui-textfield-input" type="text" name="email" value="{{ $user->email }}" />
            <div class="mdui-textfield-helper">{{ tr('Email should be unique.') }}</div>
        </div>

        <div class="mdui-textfield">
            <label class="mdui-textfield-label">{{ tr('First Name') }}</label>
            <input class="mdui-textfield-input" type="text" name="first_name" value="{{ $user->first_name }}" />
        </div>

        <div class="mdui-textfield">
            <label class="mdui-textfield-label">{{ tr('Last Name') }}</label>
            <input class="mdui-textfield-input" type="text" name="last_name" value="{{ $user->last_name }}" />
        </div>

        <button class="mdui-btn mdui-btn-outlined mdui-ripple mdui-m-t-4">{{ tr('Save') }}</button>

    </form>
@endsection
