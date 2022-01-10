@extends('layouts.app')

@section('title', tr('Create Servers'))

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Create Servers') }}</div>


    <form onsubmit="event.preventDefault();m.create(this)">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
            <input class="mdui-textfield-input" type="text" name="name" />
            <div class="mdui-textfield-helper">{{ tr('Your server name.') }}</div>
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Server IP') }}</label>
            <input class="mdui-textfield-input" type="text" name="ip" />
        </div>

        <div class="mdui-textfield mdui-textfield-floating-label">
            <label class="mdui-textfield-label">{{ tr('Server Port') }}</label>
            <input class="mdui-textfield-input" type="text" name="port" />
        </div>

        <div class="mdui-typo-display-1">{{ tr('Group') }}</div>
        <select class="mdui-select" name="group_id" mdui-select>
            <option value="0">{{ tr('No goverment server') }}</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>

        <br />
        
        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined" type="submit">{{ tr('Create Server') }}</button>
    </form>

    <script>
        m = {
            create: (ele) => {
                util.post(route('minecraftBeFlow.servers.store'), $(ele).serializeArray())
            }
        }
    </script>
@endsection
