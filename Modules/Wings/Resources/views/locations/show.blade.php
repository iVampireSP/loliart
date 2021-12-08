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
        @can('location.edit')
            <input class="mdui-typo-display-1 inline-edit team-inline-edit" value="{{ $location->name }}"
                onchange="util.wings.locations.edit({{ $location->id }}, this)"
                mdui-tooltip="{content: '{{ tr('Click to edit.') }}'}" maxlength="25" />
            <br />
            <div class="mdui-row mdui-p-b-2 mdui-p-l-1">
                <a class="mdui-btn mdui-btn-outlined mdui-ripple"
                    href="javascript: util.wings.locations.delete({{ $location->id }})">{{ tr('Delete') }}</a>

                <a class="mdui-btn mdui-btn-outlined mdui-ripple"
                    href="{{ route('wings.locations.nodes.create', $location->id) }}">{{ tr('New Node') }}</a>
            </div>
        @else
            <div class="mdui-typo-display-1">{{ $location->name }}</div>
        @endcan

        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Servers') }}</th>
                        <th>{{ tr('Memory allocated') }}</th>
                        <th>{{ tr('Disk space allocated') }}</th>
                    </tr>
                </thead>
                <tbody class="mdui-typo">
                    @foreach ($nodes as $node)
                        @php($allocated = Cache::get('wings_node_' . $node->node_id))
                        <tr id="node-{{ $node->id }}">
                            <td nowrap>{{ $location->id }}</td>
                            <td nowrap><a
                                    href="{{ route('wings.locations.nodes.show', [$node->location_id, $node->id]) }}">{{ $node->display_name }}</a>
                            </td>
                            <td nowrap></td>
                            <td nowrap>
                                {{ $allocated['attributes']['allocated_resources']['memory'] ?? tr('wait to refresh') }}
                            </td>
                            <td nowrap>
                                {{ $allocated['attributes']['allocated_resources']['disk'] ?? tr('wait to refresh') }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
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
