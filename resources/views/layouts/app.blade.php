<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />

    <meta name="csrf-token" content="{!! csrf_token() !!}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw" crossorigin="anonymous" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
        integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A" crossorigin="anonymous">
    </script>
    <script>
        var $ = mdui.$;
        var ui = mdui;
        window.user = {!! auth()->user() !!}
        window.app_name = "{{ config('app.name') }}";
    </script>

    @routes
    <livewire:styles />
    <livewire:scripts />
</head>

<body class="mdui-appbar-with-toolbar mdui-theme-primary-blue mdui-theme-accent-blue mdui-theme-layout-auto">
    <div class="mdui-progress top-progress" id="top-progress" style="display: none">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <header class="mdui-appbar mdui-appbar-fixed" id="top-appbar">
        <div class="mdui-toolbar mdui-color-white">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true, overlay:true}"><i
                    class="mdui-icon material-icons-outlined">menu</i></span>
            <a href="{{ route('main.index') }}" class="mdui-typo-headline"
                style="font-weight: 400;">{{ config('app.name') }}</a>
            <a href="javascript:;" class="mdui-typo-title" style="font-weight: 400;"
                id="top-title">{{ config('app.name') }}</a>
            <div class="mdui-toolbar-spacer"></div>
        </div>
    </header>

    <x-app-menu />

    <div class="mdui-container pjax-container" id="main">
        <div id="topic" class="mdui-m-b-1">
        </div>
        <div class="mdui-m-t-3">
            @yield('content')
        </div>
    </div>

    <div class="mdui-m-t-5 mdui-m-b-5"></div>
    <script defer src="/js/util.js?bpc={{ time() }}"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/util.js') }}"></script>

    <script>
        util.event.listen();
        $(document).ajaxError(function(event, xhr, options, data) {
            mdui.snackbar({
                position: 'right-bottom',
                message: '{{ tr('Unable to request.') }}'
            })
        });

        @if (session('message'))
            mdui.snackbar({
            message: '{{ tr(session('status')) }}',
            position: 'right-bottom',
            })
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                mdui.snackbar({
                message: '{{ tr($error) }}',
                position: 'right-bottom',
                })
            @endforeach
        @endif
    </script>
</body>

</html>
