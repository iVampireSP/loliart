@extends('layouts.app')

@section('title', tr('Subscriptions'))

@section('content')
    <div class="mdui-typo-display-2">{{ tr('Subscriptions') }}</div>

    <div class="mdui-typo-display-1 mdui-m-t-4">{{ tr('Active') }}</div>
    <div class="subscriptions">
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Start at</th>
                        <th>Ends at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actives as $active)
                        <tr>
                            <td>{{ $active->id }}</td>
                            <td>{{ $active->name }}</td>
                            <td>{{ $active->quantity }}</td>
                            <td>{{ $active->created_at }}</td>
                            <td>
                                @if (is_null($active->ends_at))
                                    -
                                @else
                                    {{ $active->ends_at }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mdui-typo-display-1 mdui-m-t-4">{{ tr('Cancelled') }}</div>
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Start at</th>
                        <th>Ends at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cancelled as $cancel)
                        <tr>
                            <td>{{ $cancel->id }}</td>
                            <td>{{ $cancel->name }}</td>
                            <td>{{ $cancel->quantity }}</td>
                            <td>{{ $cancel->created_at }}</td>
                            <td>{{ $cancel->ends_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        m = {
            e: (type, data) => {
                switch (type) {
                    case 'subscription.updated':
                        util.reload('.subscriptions')

                        break;
                }
            }
        }
    </script>


@endsection
