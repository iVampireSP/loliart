@extends('layouts.app')

@section('title', tr('Orders'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Orders') }}</div>
    <div class="pages">
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Amount Received</th>
                        <th>Team ID</th>
                        <th>User ID</th>
                        <th>Product</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->amount }}</td>
                            <td>{{ $order->amount_received }}</td>
                            <td>{{ $order->team_id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->product }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $orders->links() }}
    </div>

@endsection
