@extends('layouts.app')

@section('title', tr('Orders'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Orders') }}</div>
    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Name</th>
                    <th>Static</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
