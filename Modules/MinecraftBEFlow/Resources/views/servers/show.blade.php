@extends('layouts.app')

@section('title', $server->name)

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ $server->name }}</div>

    <div class="mdui-tab" mdui-tab>
        <a href="#infomations" class="mdui-ripple">{{ tr('Information') }}</a>
        <a href="#configuration" class="mdui-ripple">{{ tr('Basic Configuration') }}</a>
        <a href="#delete" class="mdui-ripple">{{ tr('Delete') }}</a>
    </div>


    <div id="infomations">
        @if ($server->status === 'pending')
            <p>Your server need active, please download "EdgeFlow.lxl.js" to your plugins folder, then restart server.</p>
        @else
            {{-- @if (cache()) --}}
        @endif
    </div>

    <div id="configuration">
        @if ($server->status === 'pending')
            <p>Your server need active, please download "EdgeFlow.lxl.js" to your plugins folder, then restart server.</p>
        @else
            {{-- @if (cache()) --}}
        @endif
    </div>

    <div id="delete">
        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
            onclick="m.delete()">{{ tr('Delete Server') }}</button>
    </div>

    <script>
        m = {
            delete: () => {
                ui.confirm('Are you sure to delete the MCBE server ?', () => {
                    util.delete(route('minecraftBeFlow.servers.destroy', {{ $server->id }}))
                })
            }
        }
    </script>


@endsection
