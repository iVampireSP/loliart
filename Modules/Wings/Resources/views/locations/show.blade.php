@extends('layouts.app')

@section('title', $location->name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <style>
        .mdui-typo-display-1 {
            margin-bottom: 10px
        }

    </style>
    @if ($location->status == 'created')
        <div class="mdui-typo-display-1">{{ $location->name }}</div>

        <div class="mdui-row mdui-p-b-2 mdui-p-l-1">
            <a class="mdui-btn mdui-color-theme-accent mdui-ripple"
                href="javascript: util.wings.locations.delete({{ $location->id }})">{{ tr('Delete') }}</a>
        </div>

    @elseif ($location->status == 'pending')
        <div class="mdui-typo-display-1">{{ tr('Please wait for process.') }}</div>
        <p>{{ tr('You can leave this page.') }}</p>

        <div class="mdui-progress mdui-m-t-2">
            <div class="mdui-progress-indeterminate"></div>
        </div>
    @elseif ($location->status == 'deleting')
        <div class="mdui-typo-display-1">{{ tr('Deleting location') }}</div>
        <p>{{ tr('You can leave this page.') }}</p>

        <div class="mdui-progress mdui-m-t-2 mdui-text-color-teal-500" id="location-create-progress">
            <div class="mdui-progress-determinate mdui-text-color-teal-500" style="width: 100%;"></div>
        </div>
    @else
        <div class="mdui-typo-display-1" id="location-create-text">{{ tr('Creating') . ' ' . $location->name }}</div>

        <div class="mdui-progress mdui-m-t-2" id="location-create-progress">
            <div class="mdui-progress-determinate" style="width: 0%;"></div>
        </div>

        <script>
            $(() => {
                ele = $('#location-create-progress div')
                if (parseInt($(ele).width()) === 0) {
                    $(ele).css('width', '25%')
                }
            })
        </script>
    @endif


@endsection
