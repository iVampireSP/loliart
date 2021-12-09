@extends('layouts.app')

@section('title', 'Nest: ' . $nest->name)

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">Nest: {{ $nest->name }}</div>

    <div class="mdui-table-fluid mdui-m-t-2">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Description') }}</th>
                    <th>{{ tr('Servers') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($nest->eggsList as $egg)
                    <tr id="nests-{{ $egg->id }}}">
                        <td nowrap>{{ $egg->id }}</td>
                        <td nowarp><a
                                href="{{ route('wings.nests.eggs.show', [$nest->id, $egg->id]) }}">{{ $egg->name }}</a>
                        </td>
                        <td nowarp style="word-break: break-all;word-wrap: break-word;">{{ tr($egg->description) }}</td>
                        <td nowrap>{{ $egg->servers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
