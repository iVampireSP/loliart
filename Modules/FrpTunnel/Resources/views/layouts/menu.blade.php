<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <x-home-menu-item />
            <a class="mdui-list-item mdui-ripple" href="{{ route('frpTunnel.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">dashboard</span>
                <div class="mdui-list-item-content">Frp Tunnel</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('frpTunnel.tunnels.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">view_list</span>
                <div class="mdui-list-item-content">{{ tr('All Tunnel') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('frpTunnel.tunnels.create') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">add</span>
                <div class="mdui-list-item-content">{{ tr('Create Tunnel') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('frpTunnel.servers.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">supervisor_account</span>
                <div class="mdui-list-item-content">{{ tr('Tunnel Servers') }}</div>
            </a>

        </div>
    </div>
</div>
