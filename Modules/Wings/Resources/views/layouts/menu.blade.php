<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <x-home-menu-item />
            <a class="mdui-list-item mdui-ripple" href="{{ route('wings.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">dashboard</span>
                <div class="mdui-list-item-content">Pterodactyl Wings</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="#">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">view_list</span>
                <div class="mdui-list-item-content">{{ tr('All Servers') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="#">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">add</span>
                <div class="mdui-list-item-content">{{ tr('Create Server') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="#">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">explore</span>
                <div class="mdui-list-item-content">{{ tr('Browse Servers') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="#">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">manage_accounts</span>
                <div class="mdui-list-item-content">{{ tr('Panel Accounts') }}</div>
            </a>

            <div class="mdui-collapse-item">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">supervisor_account</i>
                    <div class="mdui-list-item-content">{{ tr('Server Management') }}</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <a href="javascript:void(0);" class="mdui-list-item mdui-ripple">{{ tr('Locations') }}</a>
                    <a href="#" class="mdui-list-item mdui-ripple">{{ tr('Nodes') }}</a>
                    <a href="#" class="mdui-list-item mdui-ripple">{{ tr('Allocations') }}</a>
                    <a href="#" class="mdui-list-item mdui-ripple">{{ tr('Nests') }}</a> {{-- Eggs in Nests --}}

                </div>
            </div>
        </div>
    </div>
</div>
