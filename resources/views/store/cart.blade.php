@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td></td>
                            <td>Preço</td>
                            <td>Quantidade</td>
                            <td>Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->all() as $k=>$item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{ route('store.product', ['id' => $k]) }}">
                                        Imagem
                                    </a>
                                </td>
                                <td>
                                    <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                    <p>Código: {{ $k }}</p>
                                </td>
                                <td>
                                    R$ {{ $item['price'] }}
                                </td>
                                <td>
                                    {{ $item['qtd'] }}
                                </td>
                                <td>
                                    <p class="cart_total_price">
                                        R$ {{ $item['qtd'] * $item['price'] }}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ route('cart.destroy', ['id' => $k]) }}">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@stop