@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product: {{ $product->name }}</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control','rows'=>'3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured', 'Featured:') !!}
            {!! Form::radio('featured', 'Y', $product->featured == 'Y') !!}
            Yes
            {!! Form::radio('featured', 'N', $product->featured == 'N') !!}
            No
        </div>

        <div class="form-group">
            {!! Form::label('recommend', 'Recommend:') !!}
            {!! Form::radio('recommend', 'Y', $product->recommend == 'Y') !!}
            Yes
            {!! Form::radio('recommend', 'N', $product->recommend == 'N') !!}
            No
        </div>

        <div class="form-group">
            {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection