<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>@section('title') Мой сайт:  @show</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script defer src="{{ asset('js/scripts.js') }}"></script>
  </head>
  <body>

@section('header')
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <a href="{{ route('home') }}" class="">Главная</a>
      <a href="{{ route('page.about') }}" class="">О нас</a>
      <a href="{{ route('create_mail') }}" class="">Создать письмо</a>
      <a href="{{ route('posts.create') }}" class="">Создать пост</a>
    </div>
  </div>
</header>
@show


<main>

  @yield('content')

</main>


@include('layouts.footer')



