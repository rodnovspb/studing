<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@lang('main.online_shop'): @yield('title')</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/starter-template.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('index') }}">@lang('main.online_shop')</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_goods')</a></li>
          <li @routeactive('categor*')><a href="{{ route('categories') }}">Категории</a></li>
          <li @routeactive('basket*')><a href="{{ route('basket') }}">В корзину</a></li>
          <li><a href="{{ route('reset') }}">Сбросить проект в начальное состояние</a></li>
          <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>


          <li><a href="/locale/en">en</a></li>

          <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $currencySymbol }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($currencies as $currency)
                    <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                @endforeach
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ route('login') }}">Войти</a></li>
            @endguest
            @auth
                @admin
                        <li><a href="{{ route('home') }}">Панель администратора</a></li>
                @else
                        <li><a href="{{ route('person.orders.index') }}">Мои заказы</a></li>
                @endadmin
                <li><a href="{{ route('get-logout') }}">Выйти</a></li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
      <div class="starter-template">
          @if(session()->has('success'))
              <p class="alert alert-success">{{ session('success') }}</p>
          @elseif(session()->has('warning'))
              <p class="alert alert-warning">{{ session('warning') }}</p>
          @endif
        @yield('content')
      </div>
  </div>
</body>
<footer>
    <div class="container">
        <div class="row footer-row">
            <div class="col-lg-8">
                <p>Категории товаров</p>
                <ul>
                    @foreach($categories as $category)
                    <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8">
                <p>Самые популярные товары</p>
                <ul>
                   @foreach($bestProducts as $bestProduct)
                        <li><a href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}">{{ $bestProduct->__('name') }}</a></li>
                   @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
</html>


















