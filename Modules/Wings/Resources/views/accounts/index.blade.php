@extends('layouts.app')

@section('title', tr('Accounts'))

@section('app-menu')
    @include('wings::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Accounts') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple"
            href="{{ route('wings.accounts.create') }}">{{ tr('New Account') }}</a>
    </div>

    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ tr('Email') }}</th>
                    <th>{{ tr('Username') }}</th>
                    <th>{{ tr('Servers') }}</th>
                </tr>
            </thead>
            <tbody class="mdui-typo">
                @foreach ($accounts as $account)
                    <tr id="user-{{ $account->id }}}">
                        <td nowrap>{{ $account->id }}</td>
                        <td nowrap><a href="{{ route('wings.accounts.show', $account->id) }}">{{ $account->email }}</a>
                        </td>
                        <td nowrap>{{ $account->username }}</td>
                        <td nowrap>{{ $account->servers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
