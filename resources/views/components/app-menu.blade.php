<div>
    <div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="main-drawer">
        <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
                <a class="mdui-list-item mdui-ripple umami--click--main-link" href="{{ route('main.index') }}">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">home</span>
                    <div class="mdui-list-item-content">{{ config('app.name') }}</div>
                </a>
                @guest
                    <a class="mdui-list-item mdui-rippl umami--click--guest-login" href="{{ route('login.redirect') }}">
                        <span class="mdui-list-item-icon mdui-icon material-icons-outlined">login</span>
                        <div class="mdui-list-item-content">{{ tr('Login or register') }}</div>
                    </a>
                @endguest

                <a class="mdui-list-item mdui-rippl umami--click--guest-login" href="{{ route('teams.index') }}">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">peoples</span>
                    <div class="mdui-list-item-content">{{ tr('Teams') }}</div>
                </a>

                <a class="mdui-list-item mdui-rippl umami--click--guest-login" href="{{ route('password.reset') }}">
                    <span class="mdui-list-item-icon mdui-icon material-icons-outlined">password</span>
                    <div class="mdui-list-item-content">{{ tr('Password reset') }}</div>
                </a>
            </div>
        </div>
    </div>
</div>
