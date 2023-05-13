<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

	    <header class="header">
		    <div class="container header__container">
                <a href="{{ route('index') }}" class="header__logo">Авито</a>
                <div class="header__buttons">
                    @auth
                        <a href="{{ url('/cabinet') }}">Личный кабинет</a>
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Выйти</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}">Войти</a>
                        <a href="{{ route('register') }}">Зарегистрироваться</a>
                    @endguest
                </div>
            </div>
	    </header>

	    <main class="main">
	        <section class="content">
		        <div class="container">
                    @yield('content')
		        </div>
	        </section>
	    </main>

	    <footer class="footer">
		    <div class="container">

		    </div>
	    </footer>

    </body>
</html>

