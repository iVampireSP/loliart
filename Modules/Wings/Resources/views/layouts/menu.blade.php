<div>
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list" id="main-list" mdui-collapse="{accordion: true}">
            <x-home-menu-item />
            <a class="mdui-list-item mdui-ripple" href="{{ route('wings.index') }}">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">dashboard</span>
                <div class="mdui-list-item-content">Pterodactyl Wings</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="#">
                <span class="mdui-list-item-icon mdui-icon material-icons-outlined">?</span>
                <div class="mdui-list-item-content">Instances</div>
            </a>
        </div>
    </div>
</div>
