@extends('master')

@section('title', "Категория: $category->name")

@section('content')
    <div class="starter-template">
         <h1>
             {{ $category->name }}
         </h1>
      <p>
        {{ $category->description }}
      </p>
      <div class="row">
          @foreach($products as $product)
              @include('card', compact($product))
          @endforeach
      </div>
    </div>
@endsection



