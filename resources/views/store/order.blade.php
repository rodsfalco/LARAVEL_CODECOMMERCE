@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">

            <h2 class="title text-center">Pedido</h2>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td>Número</td>
                            <td>Usuário</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>R$ {{ number_format($order->total, 2, ",", ".") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop