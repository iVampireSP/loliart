<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <x-home-menu-item />
            <a class="mdui-list-item mdui-ripple" href="{{ route('minecraftBeFlow.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">dashboard</span>
                <div class="mdui-list-item-content">{{ session('mcbe_flow_player_name', 'Flow') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('minecraftBeFlow.groups.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">groups</span>
                <div class="mdui-list-item-content">{{ tr('Groups') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('minecraftBeFlow.servers.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">view_list</span>
                <div class="mdui-list-item-content">{{ tr('All Servers') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('minecraftBeFlow.servers.create') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">add</span>
                <div class="mdui-list-item-content">{{ tr('Create Server') }}</div>
            </a>

            <a class="mdui-list-item mdui-ripple" href="{{ route('minecraftBeFlow.servers.explore') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">explore</span>
                <div class="mdui-list-item-content">{{ tr('Browse Servers') }}</div>
            </a>

        </div>
    </div>
</div>
