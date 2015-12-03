@extends('app')

@section('content')
    <div class="container">
        <h1>Orders</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opção</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->statusStr }}</td>
                    <td>
                        @if($order->isAtivo())
                            <a href="{{ route('orders.change', ['id' => $order->id]) }}" class="btn btn-success">
                                {{ $order->proximoStatus() }}
                            </a>
                        @endif
                        @if($order->isAberto())
                            <a href="{{ route('orders.cancel', ['id' => $order->id]) }}" class="btn btn-danger">
                                Cancelar
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection