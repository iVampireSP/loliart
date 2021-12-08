@extends('layouts.app')

@section('title', tr('Locations'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Locations') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="javascript: util.wings.locations.create()">{{ tr('New Location') }}</a>
    </div>

    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Nodes') }}</th>
                    <th>{{ tr('Servers') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($locations as $location)
                    <tr id="location-{{ $location->id }}}">
                        <td nowrap>{{ $location->id }}</td>
                        <td nowrap><a
                                href="{{ route('wings.locations.show', $location->id) }}">{{ $location->name }}</a></td>
                        <td nowrap>{{ $location->nodes }}</td>
                        <td nowrap>{{ $location->servers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
