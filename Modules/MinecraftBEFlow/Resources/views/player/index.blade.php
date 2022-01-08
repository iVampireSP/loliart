@extends('layouts.app')

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('title', $player->name)

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('Hi') }}, {{ $player->name }}</h1>

    <p>你加入的时间: {{ $player->created_at }}</p>

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
