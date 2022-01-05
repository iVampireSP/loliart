<div class="mdui-collapse-item">
    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">apps</i>
        <div class="mdui-list-item-content">{{ tr('Services') }}</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-collapse-item-body mdui-list">
        <a href="{{ route('wings.index') }}" class="mdui-list-item mdui-ripple">{{ tr('Game Containers') }}</a>
        <a href="{{ route('frpTunnel.index') }}" class="mdui-list-item mdui-ripple">{{ tr('Frp Tunnel') }}</a>

        <!-- Minecraft -->
        <div>
            <div class="mdui-list" mdui-collapse="{accordion: true}">
                <div class="mdui-collapse-item">
                    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content sub-menu-title">{{ tr('Minecraft') }}</div>
                        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-collapse-item-body mdui-list">
                        <a href="{{ route('minecraftBeFlow.index') }}"
                            class="mdui-list-item mdui-ripple">{{ tr('Bedrock Server flow') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Minecraft -->

    </div>
</div>
