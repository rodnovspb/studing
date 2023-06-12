<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="wrapper">
	        <header class="header">
		        <div class="container">
                    <div class="header__block">
                        <a class="header__logo" href="{{ route('index') }}">
                           rodnovspb
                        </a>
                        <nav class="header__menu menu">
                            <a href="{{ route('cities') }}">Выберите ваш город</a>
                        </nav>
                        <div class="header__contacts">
                            <div class="header__phone">
                                <div class="header__messengers">
                                    <a class="header__whatsapp" href="https://wa.me/79507261797" target="_blank" title="whatsapp">
                                        <svg>
                                            <use href="{{ asset('storage/images/sprite.svg#whatsapp') }}"></use>
                                        </svg>
                                    </a>
                                    <a class="header__telegram" href="https://telegram.me/cinedbs" target="_blank" title="telegram">
                                        <svg>
                                            <use href="{{ asset('storage/images/sprite.svg#telegram') }}"></use>
                                        </svg>
                                    </a>
                                </div>
                                <a class="header__tel" href="tel:+79507261797">89507261797</a>
                            </div>
                            <a class="header__email" href="mailto:rodnovspb@mail.ru">rodnovspb@mail.ru</a>
                        </div>
                    </div>

		        </div>
	        </header>
	        <main class="main">
                @yield('content')
	        </main>
	        <footer class="footer">
		        <div class="container">
		        </div>
	        </footer>
	    </div>
    </body>
</html>

