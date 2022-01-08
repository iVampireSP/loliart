@extends('layouts.app')

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('title', $player->name)

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Hi') }}, {{ $player->name }}</h1>

    <p>{{ tr('Joined at') }}: {{ $player->created_at }}</p>
    <p>{{ tr('Binding to server for the first time') }}: {{ $player->server->name }}</p>

    @if (!is_null($cache))
        <p>{{ tr('Position') }}: X={{ $cache['pos'][0] }} Y={{ $cache['pos'][1] }} Z={{ $cache['pos'][2] }}</p>
    @endif

    <p>{{ tr('Now at server') }}: <a>{{ $cache['server_name'] }}</a></p>

    <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
        onclick="m.delete()">{{ tr('Delete Profile') }}</button>

    <script>
        m = {
            delete: () => {
                ui.confirm('You cannot restore if you delete your profile, are you sure?', () => {
                    util.delete(route('minecraftBeFlow.player.destroy'))
                })
            }
        }
    </script>

@endsection
