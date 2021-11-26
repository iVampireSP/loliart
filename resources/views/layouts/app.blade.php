<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />

    <meta name="csrf-token" content="{!! csrf_token() !!}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw" crossorigin="anonymous" />
    <link href="https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/riktar/jkanban@1.3.1/dist/jkanban.min.css" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
        integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A" crossorigin="anonymous">
    </script>

    <livewire:styles />
    <livewire:scripts />
</head>

<body class="mdui-appbar-with-toolbar mdui-theme-primary-blue mdui-theme-accent-blue mdui-theme-layout-auto">
    <div class="mdui-progress top-progress" style="display: none">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <header class="mdui-appbar mdui-appbar-fixed" id="top-appbar">
        <div class="mdui-toolbar mdui-color-white">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"
                mdui-drawer="{target: '#main-drawer', swipe: true, overlay:true}"><i
                    class="mdui-icon material-icons-outlined">menu</i></span>
            <a href="/" class="mdui-typo-title" style="font-weight: 400;" id="top-title">{{ config('app.name') }}</a>
            <div class="mdui-toolbar-spacer"></div>
        </div>
    </header>

    <div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="main-drawer">
        <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
                <a class="mdui-list-item mdui-ripple umami--click--main-link" href="#">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">home</span>
                    <div class="mdui-list-item-content">{{ config('app.name') }}</div>
                </a>
                @guest
                    <a class="mdui-list-item mdui-rippl umami--click--guest-login" href="{{ route('login.redirect') }}">
                        <span class="mdui-list-item-icon mdui-icon material-icons-outlined">login</span>
                        <div class="mdui-list-item-content">登录或注册</div>
                    </a>
                @endguest
                <a class="mdui-list-item mdui-ripple umami--click--why-begin" href="#">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">volunteer_activism</span>
                    <div class="mdui-list-item-content">我们的初心</div>
                </a>
            </div>
        </div>
    </div>

    <div class="mdui-container pjax-container" id="main">
        <div id="topic" class="mdui-m-b-1">
        </div>
        <div class="mdui-m-t-3">
            @yield('content')
        </div>
    </div>

    <div class="mdui-m-t-5 mdui-m-b-5"></div>
</body>

</html>
