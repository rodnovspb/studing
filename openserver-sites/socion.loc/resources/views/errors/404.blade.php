@extends('layouts.layout')

@section('title', 'Ошибка 404 - Страница не найдена')
@section('description', 'Ошибка 404 - Страница не найдена')
@section('keywords', '404 ошибка')

@section('content')

  <h1 style="color: red">Страница не найдена</h1>
  <div class="text">
    <p>Скорее всего вы искали 17 социотип. Пожелаем вам успехов! :)</p>
    <p style="text-align: center;"><a href="{{ route('index') }}">Перейти на главную</a></p>
  </div>

@endsection



