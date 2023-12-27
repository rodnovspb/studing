<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('parts.services')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
<!--<script src="//code.jivo.ru/widget/IVgSsGUjK0" async></script>-->
<title>@yield('title', 'Соционика - заголовок по умолчанию')</title>
</head>
<body>
<div class="wrapper">

<header class="header">
  <div class="container header__container">
    <div class="header__menu">
      <a class="header__logo" href="{{ route('index') }}" title="На главную">социон.рф</a>
      <button class="header__burger"></button>
    </div>
  </div>
</header>

<main class="main">
      <div class="container main__container">
        <div class="main__left">
          <button class="header__burger"></button>
          <div class="main__menu">
            <a href="{{ route('index') }}" @if(request()->route()->getName() === 'index') class="{{ 'active' }}" @endif>О соционике</a>
            <a href="{{ route('tests') }}" @if(request()->route()->getName() === 'tests') class="{{ 'active' }}" @endif>Тесты</a>
            <a href="{{ route('calculator') }}" @if(request()->route()->getName() === 'calculator') class="{{ 'active' }}" @endif>Калькулятор</a>
            <a href="{{ route('tipirovanie') }}" @if(request()->route()->getName() === 'tipirovanie') class="{{ 'active' }}" @endif>Типирование</a>
            <a href="{{ route('contacts') }}" @if(request()->route()->getName() === 'contacts') class="{{ 'active' }}" @endif>Контакты</a>
          </div>
        </div>
        <div class="main__right">
          <div class="main__content">
            @yield('content')
          </div>
        </div>
      </div>
</main>

</div>

<div class="overlay" hidden></div>

@stack('script')

@include('parts.modal')

</body>
</html>
