@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">{{ $category->name }}</h2>

            @foreach($products as $product)
                @include('store.product_partial')
            @endforeach
        </div>
    </div>
@stop