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
                   <a class="header__logo" href="{{ route('index') }}">rodnov<span>spb</span></a>
                   <nav class="header__menu menu">

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
	        </header>
	        <main class="main">
                @yield('content')
	        </main>
	        <footer class="footer">
                    <div class="footer__wrapper">
                        <div class="footer__col-1">
                            <a class="footer__logo" href="{{ route('index') }}">rodnov<span>spb</span></a>
                        </div>
                        <div class="footer__col-2">
                            <div class="footer__email">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#mail') }}"></use>
                                </svg>
                                rodnovspb@mail.ru
                            </div>
                            <div class="footer__phone">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#phone') }}"></use>
                                </svg>
                                8-950-726-17-97
                            </div>
                        </div>
                        <div class="footer__col-3">
                            <div class="footer__address">
                                <a href="{{ route('cities') }}" target="_blank">
                                    <svg>
                                        <use href="{{ asset('storage/images/sprite.svg#map') }}"></use>
                                    </svg>
                                </a>
                                Санкт-Петербург, ул. Бармалеева, 7А
                            </div>
                        </div>
                        <div class="footer__col-4">
                            <a class="footer__whatsapp" href="https://wa.me/79507261797" target="_blank" title="whatsapp">
                                <svg>
                                    <use href="{{ asset('storage/images/sprite.svg#whatsapp') }}"></use>
                                </svg>
                                <span>Написать в WhatsApp</span>
                            </a>
                            <a class="footer__telegram" href="https://telegram.me/cinedbs" target="_blank" title="telegram">
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

