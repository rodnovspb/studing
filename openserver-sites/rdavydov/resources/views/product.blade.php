@extends('layouts.master')

@section('title', 'Товар')

@section('content')
      <h1>{{ $product->name }}</h1>
      <h2>{{ $product->category->name }}</h2>
      <div style="margin-top: 20px; margin-bottom: 20px;">
          @if($product->isNew()) <span class="badge badge-success">Новинка</span>  @endif
          @if($product->isRecommend()) <span class="badge badge-warning">Рекомендуемое</span>  @endif
          @if($product->isHit()) <span class="badge badge-danger">Хит продаж</span>  @endif
      </div>
      <p>Цена: <b>{{ $product->price }}</p>
      <img src="{{ Storage::url($product->image) }}" height="300" width="auto">
      <p>{{ $product->description }}</p>

      <form action="{{ route('busket-add', $product) }}" method="POST">
          @csrf
          @if($product->isAvailable())
              <button type="submit" class="btn btn-success" role="button">В корзину</button>
          @else
              <button type="submit" class="btn btn-primary" role="button" disabled>Товар не доступен</button>
          @endif
        </form>
@endsection


