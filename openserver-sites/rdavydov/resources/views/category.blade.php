@extends('layouts.master')

@section('title', "Категория: $category->__('name')")

@section('content')
    <h1>
             {{ $category->__('name') }} {{ $category->products->count() }} шт.
         </h1>
    <p>
        {{ $category->__('description') }}
      </p>
    <div class="row">
          @foreach($category->products as $product)
            @include('card', compact($product))
        @endforeach
      </div>
@endsection



