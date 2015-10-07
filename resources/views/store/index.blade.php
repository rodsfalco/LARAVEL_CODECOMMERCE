@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($pFeatured as $product)
                @include('store.product_partial')
            @endforeach

        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @foreach($pRecommended as $product)
                @include('store.product_partial')
            @endforeach

        </div><!--recommended-->

    </div>
@stop