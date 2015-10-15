@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
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
                                <td>
                                    <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                    <p>Código: {{ $k }}</p>
                                </td>
                                <td>
                                    R$ {{ number_format($item['price'], 2, ",", ".") }}
                                </td>
                                <td>
                                    {{ $item['qtd'] }}
                                    <a href="{{ route('cart.update', ['id' => $k , 'qtd' => $item['qtd']+1]) }}" class="label label-success" >˄</a>
                                    @if($item['qtd'] > 0)
                                        <a href="{{ route('cart.update', ['id' => $k , 'qtd' => $item['qtd']-1]) }}" class="label label-danger">˅</a>
                                    @endif
                                </td>
                                <td>
                                    <p class="cart_total_price">
                                        R$ {{ number_format($item['qtd'] * $item['price'], 2, ",", ".") }}
                                    </p>
                                </td>
                                <td>
                                    <div class="pull-right">
                                        <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="btn btn-default">Remover</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    Nenhum item encontrado.
                                </td>
                            </tr>
                        @endforelse

                        <tr class="cart_menu">
                            <td colspan="3"></td>
                            <td>
                                <p class="cart_total_price" style="color:white;">
                                    R$ {{ number_format($cart->getTotal(), 2, ",", ".") }}
                                </p>
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a conta</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@stop