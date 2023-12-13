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
<script src="//code.jivo.ru/widget/IVgSsGUjK0" async></script>
<title>@yield('title', 'Соционика - заголовок по умолчанию')</title>
</head>
<body>
<div class="wrapper">

@yield('content')

</div>


</body>
</html>
