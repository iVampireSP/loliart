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
        window.user = {!! auth()->user() ?? 0 !!};
        window.team = {!! session('team') ?? 0 !!};
        window.app = {!! app_info() !!};
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
        <div class="mdui-toolbar mdui-color-white top-bar">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true, overlay:true}"><i
                    class="mdui-icon material-icons-outlined">menu</i></span>
            <a href="{{ route('main.index') }}" class="mdui-typo-headline" style="font-weight: 400;"
                id="app-title">{{ config('app.name') }}</a>
            <a href="javascript:;" class="mdui-typo-title" style="font-weight: 400;"
                id="top-title">{{ config('app.name') }}</a>
            <div class="mdui-toolbar-spacer"></div>
            @auth
                <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-menu="{target: '#app-menu'}">
                    <i class="mdui-icon material-icons-outlined">more_vert</i>
                </span>
                <x-tool-menu />
            @endauth
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

    <div class="mdui-container mdui-m-t-5">
        <div class="mdui-typo">
            <p class="mdui-typo-caption-opacity mdui-text-center">
                {{ config('app.name') }}
                <br />
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="git-icon" viewBox="0 0 16 16">
                    <path
                        d="M15.698 7.287 8.712.302a1.03 1.03 0 0 0-1.457 0l-1.45 1.45 1.84 1.84a1.223 1.223 0 0 1 1.55 1.56l1.773 1.774a1.224 1.224 0 0 1 1.267 2.025 1.226 1.226 0 0 1-2.002-1.334L8.58 5.963v4.353a1.226 1.226 0 1 1-1.008-.036V5.887a1.226 1.226 0 0 1-.666-1.608L5.093 2.465l-4.79 4.79a1.03 1.03 0 0 0 0 1.457l6.986 6.986a1.03 1.03 0 0 0 1.457 0l6.953-6.953a1.031 1.031 0 0 0 0-1.457" />
                </svg>
                <span id="version"></span>
            </p>
        </div>
    </div>

    <div class="mdui-m-t-5 mdui-m-b-5"></div>
    <script defer src="/js/util.js?bpc={{ time() }}"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/util.js') }}"></script>

    <script>
        if (CSS && 'paintWorklet' in CSS) CSS.paintWorklet.addModule('https://unpkg.com/smooth-corners')

        util.event.listen();
        $(document).ajaxError(function(event, xhr, options, data) {
            mdui.snackbar({
                position: 'right-bottom',
                message: '{{ tr('Unable to request.') }}'
            })
        });
    </script>
    <script>
        @if (session('message'))
            mdui.snackbar({
            message: '{{ tr(session('message')) }}',
            position: 'right-bottom',
            })
        @endif

        @if (session('alert'))
            mdui.alert('{{ session('alert') }}', () => {}, {history: false});
        @endif
    </script>
</body>

</html>
