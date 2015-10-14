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
                        @forelse($cart->all() as $k=>$item)
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
                                    R$ {{ number_format($item['price'], 2, ",", ".") }}
                                </td>
                                <td>
                                    {{ $item['qtd'] }}
                                </td>
                                <td>
                                    <p class="cart_total_price">
                                        R$ {{ number_format($item['qtd'] * $item['price'], 2, ",", ".") }}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ route('cart.destroy', ['id' => $k]) }}">Remover</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    Nenhum item encontrado.
                                </td>
                            </tr>
                        @endforelse

                        <tr class="cart_menu">
                            <td colspan="4"></td>
                            <td>
                                R$ {{ number_format($cart->getTotal(), 2, ",", ".") }}
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-success">Fechar a conta</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@stop