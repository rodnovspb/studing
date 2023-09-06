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
        @include('parts.services')
        @include('parts.favicon')
    </head>
    <body>
        <div class="wrapper">
	        <header class="header">
               <div class="header__block">
                   <div class="header__row-1">
                       <a class="header__logo logo" href="{{ route('index') }}" title="На главную">
                           <div class="logo__image">rodnov<span>spb</span></div>
                           <div class="logo__text">разработка сайтов</div>
                       </a>
                       <div class="header__phone">
                            <a class="header__whatsapp" href="https://wa.me/79507261797" target="_blank" title="whatsapp по созданию сайтов">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#whatsapp') }}"></use>
                                </svg>
                            </a>
                            <a class="header__telegram" href="https://telegram.me/cinedbs" target="_blank" title="telegram по разработке сайтов">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#telegram') }}"></use>
                                </svg>
                            </a>
                            <a title="Телефон - создание сайтов" class="header__tel" href="tel:+79507261797">89507261797</a>
                       </div>
                   </div>
                   <div class="header__row-2">
                       <a title="Почта - разработка сайтов" class="header__email" href="mailto:rodnovspb@mail.ru">rodnovspb@mail.ru</a>
                   </div>
               </div>
	        </header>
	        <main class="main">
                @yield('content')
	        </main>
	        <footer class="footer">
                    <div class="footer__wrapper">
                        <div class="footer__col-1" title="Главная - разработка сайтов">
                            <a class="footer__logo" href="{{ route('index') }}">rodnov<span>spb</span></a>
                        </div>
                        <div class="footer__col-2">
                            <a href="mailto:rodnovspb@mail.ru" class="footer__email" title="Почта - заказать создание сайта">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#mail') }}"></use>
                                </svg>
                                rodnovspb@mail.ru
                            </a>
                            <a href="tel:+79507261797" class="footer__phone" title="Телефон - заказать разработку сайта">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#phone') }}"></use>
                                </svg>
                                8-950-726-17-97
                            </a>
                        </div>
                        <div class="footer__col-3">
                            <div class="footer__address">
                                <a href="{{ route('cities') }}" title="Разработка сайтов в городах">
                                    <svg>
                                        <use href="{{ asset('storage/images/sprite.svg#map') }}"></use>
                                    </svg>
                                </a>
                                Санкт-Петербург, ул. Бармалеева, 7А
                            </div>
                        </div>
                        <div class="footer__col-4">
                            <a class="footer__whatsapp" href="https://wa.me/79507261797" target="_blank" title="WhatsApp по созданию сайта и цене">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#whatsapp') }}"></use>
                                </svg>
                                <span>Написать в WhatsApp</span>
                            </a>
                            <a class="footer__telegram" href="https://telegram.me/dghgcghh" target="_blank" title="Telegram по разработке сайта и цене">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#telegram') }}"></use>
                                </svg>
                                <span>Написать в Телеграм</span>
                            </a>
                        </div>
                    </div>
	        </footer>
	    </div>
        @stack('scripts')
    </body>
</html>

