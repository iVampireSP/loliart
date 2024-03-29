<div>
    <button data-lock-pass class="mdui-btn mdui-btn-icon mdui-float-right" style="z-index: 1;pointer-events: all;"
        onclick="event.preventDefault();util.toggleLock('{{ $for }}', true)"
        data-lock-btn="{{ $for }}"
        mdui-tooltip="{content: '{{ tr('Lock/Unlock') }}', position: 'left', delay: 1000}">
        <i class="mdui-icon material-icons">lock_open</i>
    </button>
    @if ($lock)
        <script>
            $(() => {
                util.toggleLock('{{ $for }}')
            })
        </script>
    @endif
</div>
