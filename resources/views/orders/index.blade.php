@extends('app')

@section('content')
    <div class="container">
        <h1>Orders</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->statusStr }}</td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection