<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('parts.services')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
<title>@yield('title', 'Соционика - заголовок по умолчанию')</title>
</head>
<body>
<div class="wrapper">
<header class="header">
    <div class="container">
        <div class="header__row">
            <a href="{{ route('index') }}" title="На главную">социон.рф</a>
            <a href="{{ route('tests') }}" title="Тесты по соционике">тесты</a>
            <a href="{{ route('tipirovanie') }}" title="Типирование по соционике">типирование</a>
            <a href="{{ route('contacts') }}">контакты</a>
        </div>
    </div>

</header>

<main class="main">

@yield('content')

</main>
<footer class="footer">

</footer>





</div>

@stack('script')

@include('parts.modal')

</body>
</html>
