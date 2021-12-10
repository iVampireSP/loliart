<div class="mdui-m-t-2">
    @if ($paginator->hasPages())
        @if ($paginator->onFirstPage())
            <button disabled
                class="mdui-float-left mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Previous page') }}</button>
        @else
            <a onclick="util.url.to('{{ $paginator->previousPageUrl() }}', '.pages', '.pages-link')"
                class="mdui-float-left mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Previous page') }}</a>
        @endif

        @if ($paginator->hasMorePages())
            <a onclick="util.url.to('{{ $paginator->nextPageUrl() }}', '.pages', '.pages-link')"
                class="mdui-float-right mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Next page') }}</a>
        @else
            <button disabled
                class="mdui-float-right mdui-btn mdui-color-theme-accent mdui-ripple">{{ tr('Next page') }}</button>
        @endif

    @endif

</div>
