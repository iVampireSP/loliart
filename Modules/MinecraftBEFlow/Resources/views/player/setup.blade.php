@extends('layouts.app')

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('title', 'Setup')

@section('content')
    <h1 class="mdui-typo-display-1">Setup</h1>

    <p>{{ tr('Hi, ' . auth()->user()->name . ', welcome to server flow! Let\'s bind your Xbox account.') }}</p>

    <p>{{ tr('Your code') }}: </p>
    <span class="bind-code" style="font-size: 24px"><code>/edge-bind {{ $random }}</code></span>
    <p>{{ tr('the code will be expired in 10 minutes.') }}</p>


    <script>
        m = {
            e: (type, data) => {
                switch (type) {
                    case 'mcbe.flow.player.bind.refreshed':
                        util.reload('.bind-code');


                        break;
                }
            }
        }
    </script>

@endsection
