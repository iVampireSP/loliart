@extends('layouts.app')

@section('title', 'Nests')

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">Nests</div>

    <div class="mdui-table-fluid mdui-m-t-2">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Name') }}</th>
                    <th>{{ tr('Description') }}</th>
                    <th>{{ tr('Eggs') }}</th>
                    <th>{{ tr('Servers') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($nests as $nest)
                    <tr id="nests-{{ $nest->id }}}">
                        <td nowrap>{{ $nest->id }}</td>
                        <td nowrap><a href="{{ route('wings.nests.show', $nest->id) }}">{{ $nest->name }}</a></td>
                        <td nowrap>{{ $nest->description }}</td>
                        <td nowrap>{{ $nest->eggs }}</td>
                        <td nowrap>{{ $nest->servers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
