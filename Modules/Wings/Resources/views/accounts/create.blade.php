@extends('layouts.app')

@section('title', tr('New Account'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('New Account') }}</div>

    <form action="#" id="new" class="mdui-m-t-5" onsubmit="event.preventDefault();util.wings.accounts.create($(this))">

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Username') }}</label>
            <input class="mdui-textfield-input" type="text" name="username" />
            <div class="mdui-textfield-helper">{{ tr('Username should be unique.') }}</div>
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Email') }}</label>
            <input class="mdui-textfield-input" type="text" name="email" />
            <div class="mdui-textfield-helper">{{ tr('Email should be unique.') }}</div>
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('First Name') }}</label>
            <input class="mdui-textfield-input" type="text" name="first_name" />
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Last Name') }}</label>
            <input class="mdui-textfield-input" type="text" name="last_name" />
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Password') }}</label>
            <input class="mdui-textfield-input" type="password" name="password" />
        </div>

        <button class="mdui-btn mdui-btn-outlined mdui-ripple mdui-m-t-4">{{ tr('Create') }}</button>

    </form>
@endsection
