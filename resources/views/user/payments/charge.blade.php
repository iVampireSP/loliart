@extends('layouts.app')

@section('title', tr('Charge to Account'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Charge to Account') }}</div>

    <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">{{ tr('Value') }}</label>
        <input class="mdui-textfield-input"  name="value" type="text" />
    </div>

@endsection
