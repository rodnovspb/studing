<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">


<title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
<header class="header">
    <div class="container">
        <div class="header__row">
            <div class="header__logo">Бармалеева, 7</div>
            <div>
                @auth
                    <a class="header__logout" href="{{ route('logout') }}">Выйти</a>
                @endauth
            </div>
        </div>
    </div>
</header>




