@extends('layouts.master')

@section('title', 'Товар')

@section('content')
      <h1>iPhone X 64GB</h1>
      <h2>Мобильные телефоны</h2>
        <h2>{{ $product }}</h2>
      <p>Цена: <b>71990 ₽</b></p>
      <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
      <p>Отличный продвинутый телефон с памятью на 64 gb</p>

      <form action="{{ route('busket-add', $product) }}" method="POST">
          @csrf
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
        </form>
@endsection


