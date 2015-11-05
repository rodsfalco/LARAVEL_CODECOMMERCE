@extends('store.store')

@section('content')

    <div class="container">

        <h2 class="title text-center">Meus pedidos</h2>

        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td>#ID</td>
                        <td>Itens</td>
                        <td>Valor</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach($order->items as $item)
                                    <ul>
                                        <li>
                                            {{ $item->product->name }}
                                        </li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop