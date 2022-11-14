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


          @if($product->isAvailable())
              <form action="{{ route('busket-add', $product) }}" method="POST">
          @csrf
              <button type="submit" class="btn btn-success" role="button">В корзину</button>
              </form>
          @else
              <span class="badge bg-secondary" style="padding: 10px 25px;">Товар не доступен</span>
              <div style="margin-top: 20px;"><span>Сообщить, когда товар появится</span></div>
              <form action="{{ route('subscription', $product) }}" method="POST">
                  @csrf
                  <span class="badge badge-danger">@error('email') {{ $message }}  @enderror</span>
                  <br>
                  <input type="text" name="email" placeholder="Ваша почта">
                  <button type="submit">Отправить</button>
              </form>
          @endif

@endsection


