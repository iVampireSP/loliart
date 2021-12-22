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


            <div class="mdui-collapse-item">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">account_circle</i>
                    <div class="mdui-list-item-content">{{ auth()->user()->name ?? tr('Guest') }}</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="{{ route('user.balance.manage') }}"
                        class="mdui-list-item mdui-ripple">{{ tr('Payment') }}</a>
                </div>

                <div class="mdui-collapse-item-body mdui-list">
                    <a href="{{ route('user.subscriptions') }}"
                        class="mdui-list-item mdui-ripple">{{ tr('Orders') }}</a>
                </div>

                <div class="mdui-collapse-item-body mdui-list">
                    <a href="{{ route('user.subscriptions') }}"
                        class="mdui-list-item mdui-ripple">{{ tr('Subscriptions') }}</a>
                </div>
            </div>

        </div>

        <div class="edge-bottom">
            <div class="mdui-typo-caption-opacity mdui-text-center">&copy; 2021 Edge Stading. All rights reserved.
            </div>
        </div>
    </div>
</div>
