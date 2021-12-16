<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <x-home-menu-item />
            <x-services-menu-item />

            <a class="mdui-list-item mdui-ripple" href="{{ route('teams.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">peoples</span>
                <div class="mdui-list-item-content">{{ tr('Teams') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('password.reset') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">password</span>
                <div class="mdui-list-item-content">{{ tr('Password reset') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('permission.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">policy</span>
                <div class="mdui-list-item-content">{{ tr('Roles and Permissions') }}</div>
            </a>

        </div>
        <div class="edge-bottom">
            <div class="mdui-typo-caption-opacity mdui-text-center">&copy; 2021 Edge Stading. All rights reserved.
            </div>
        </div>
    </div>
</div>
