@extends('layouts.app')

@section('title', $node->display_name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <style>
        .mdui-typo-display-1 {
            margin-bottom: 10px
        }

    </style>
    @if ($node->status == 'created')
        @can('node.edit')
            <input class="mdui-typo-display-1 inline-edit team-inline-edit" value="{{ $node->display_name }}"
                onchange="util.wings.locations.nodes.edit({{ $node->id }}, {{ $node->location_id }},this)"
                mdui-tooltip="{content: '{{ tr('Click to edit.') }}'}" maxlength="25" />
            <br />
            <div class="mdui-row mdui-p-b-2 mdui-p-l-1">
                <a class="mdui-btn mdui-btn-outlined mdui-ripple"
                    href="javascript: util.wings.locations.nodes.delete({{ $node->id }}, {{ $node->location_id }})">{{ tr('Delete') }}</a>
            </div>
        @else
            <div class="mdui-typo-display-1">{{ $node->display_name }}</div>
        @endcan

        {{-- <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Servers') }}</th>
                        <th>{{ tr('Disk space allocated') }}</th>
                        <th>{{ tr('Memory allocated') }}</th>
                    </tr>
                </thead>
                <tbody class="mdui-typo">
                    @foreach ($nodes as $node)
                        <tr id="node-{{ $node->id }}}">
                            <td nowrap>{{ $location->id }}</td>
                            <td nowrap><a
                                    href="{{ route('wings.locations.nodes.show', [$node->location_id, $node->id]) }}">{{ $node->name }}</a>
                            </td>
                            <td nowrap>0</td>
                            <td nowrap>0</td>
                            <td nowrap>0</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}


    @else ($location->status == 'pending')
        <div class="mdui-typo-display-1">{{ tr('Please wait for process.') }}</div>
        <p>{{ tr('You can leave this page.') }}</p>

    @endif

@endsection
