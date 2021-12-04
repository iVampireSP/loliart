<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <a class="mdui-list-item mdui-ripple" href="{{ route('main.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">home</span>
                <div class="mdui-list-item-content">{{ config('app.name') }}</div>
            </a>
            @guest
                <a class="mdui-list-item mdui-ripple" href="{{ route('login.redirect') }}">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">login</span>
                    <div class="mdui-list-item-content">{{ tr('Login or register') }}</div>
                </a>
            @endguest
        </div>
    </div>
</div>