<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="wrapper">
	        <header class="header">
		        <div class="container">
                    <div class="header__block">
                        <a class="header__logo" href="{{ route('index') }}">
                            <svg>
                                <use href="{{ asset('storage/images/sprite.svg#logo') }}"></use>
                            </svg>
                        </a>
{{--                        <nav class="header__menu menu">--}}
{{--                            <a href="#" class="menu__link">Сайты</a>--}}
{{--                            <a href="#" class="menu__link">Боты</a>--}}
{{--                            <a href="#" class="menu__link">Парсинг</a>--}}
{{--                        </nav>--}}
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
	            <section class="content">
		            <div class="container">
                        <h1 class="content__title">Самое сложное&nbsp;&mdash; <span class="content__subtitle">сделать просто</span></h1>
		            </div>
	            </section>
	        </main>
	        <footer class="footer">
		        <div class="container">

		        </div>
	        </footer>
	    </div>
    </body>
</html>

