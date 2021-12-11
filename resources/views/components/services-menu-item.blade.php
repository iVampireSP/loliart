<div class="mdui-collapse-item">
    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">apps</i>
        <div class="mdui-list-item-content">{{ tr('Services') }}</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-collapse-item-body mdui-list">
        {{-- <a href="{{ route('teams.index') }}" class="mdui-list-item mdui-ripple">{{ tr('Teams') }}</a> --}}
        <a href="{{ route('wings.index') }}" class="mdui-list-item mdui-ripple">{{ tr('Game Containers') }}</a>
    </div>
</div>
