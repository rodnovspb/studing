<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<base href="{{ $modx->getConfig('site_url') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="{{ $documentObject['keywords'] }}">
<meta name="description" content="{{ $documentObject['description'] }}">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="stylesheet" href="assets/fonts/fonts.css">
@include('parts.services')
<title>{{ $documentObject['pagetitle'] }}</title>
</head>
<body>
<div class="wrapper">
<header class="header">
    <div class="container">
        <div class="header__row">
            <a href="/" class="header__logo" title="На главную">социон.рф</a>
            <div class="header__contacts">
                <a class="header__email" href="mailto:socion@internet.ru" title="Наша почта">socion@internet.ru</a>
            </div>
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

</body>
</html>
