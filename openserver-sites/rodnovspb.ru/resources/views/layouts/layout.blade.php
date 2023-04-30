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
                        <a href="{{ route('index') }}">
                            <svg class="header__logo">
                                <use href="{{ asset('storage/images/sprite.svg#logo') }}"></use>
                            </svg>
                        </a>
                        <nav class="header__menu menu">
                            <a href="#" class="menu__link">Сайты</a>
                            <a href="#" class="menu__link">Боты</a>
                            <a href="#" class="menu__link">Парсинг</a>
                            <a href="#" class="menu__link">Дополнительный функционал</a>
                            <a href="#" class="menu__link">Контакты</a>
                        </nav>
                    </div>


		        </div>
	        </header>
	        <main class="main">
	            <section class="content">
		            <div class="container">

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

