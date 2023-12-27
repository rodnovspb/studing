<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <base href="{{ $modx->getConfig('site_url') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $documentObject['metakeywords'] }}">
        <meta name="description" content="{{ $documentObject['metadescription'] }}">
        <title>{{ $documentObject['metatitle'] }}</title>
        <link rel="stylesheet" href="/template/fonts/fonts.css">
        <link rel="stylesheet" href="/template/css/app.css">
        @stack('header')
        <link rel="canonical" href="{{ $modx->getConfig('site_start_url') }}{{ urlProcessor::makeUrl($documentObject['id']) }}">
        <script src="//code.jivo.ru/widget/d2e8kuV8fO" async></script>
    </head>
    <body>
      <div class="wrapper">
        <header class="header">
          <div class="container">
            <div class="header__row">
              <a class="header__logo" href="/">
                <img src="{{ $modx->getConfig('client_logo') }}" alt="Логотип">
              </a>
              <div class="header__place">
                <div class="header__time">{{ $modx->getConfig('client_time') }}</div>
                <div class="header__address">{{ $modx->getConfig('client_address') }}</div>
              </div>
              <div class="header__phone">
                <div class="header__messengers">
                  <a class="header__whatsapp-icon" href="https://wa.me/{{ $modx->getConfig('client_whatsapp') }}" target="_blank">
                    <svg>
                      <use href="/template/images/sprite.svg#whatsapp"></use>
                    </svg>
                  </a>
                  <a class="header__telegram-icon" href="https://telegram.me/{{ $modx->getConfig('client_telegram') }}" target="_blank">
                    <svg>
                      <use href="/template/images/sprite.svg#telegram"></use>
                    </svg>
                  </a>
                  <a class="header__phone-icon" href="tel:{{ $modx->getConfig('client_phone_+7') }}">
                    <svg>
                      <use href="/template/images/sprite.svg#phone"></use>
                    </svg>
                  </a>
                </div>
                <a class="header__number" href="tel:{{ $modx->getConfig('client_phone_+7') }}">{{ $modx->getConfig('client_phone') }}</a>
              </div>
              <a class="header__email" href="mailto:{{ $modx->getConfig('client_email') }}">
                <svg>
                  <use href="/template/images/sprite.svg#mail"></use>
                </svg>
                <span>{{ $modx->getConfig('client_email') }}</span>
              </a>
              <button class="header__burger burger"></button>
            </div>
          </div>
        </header>
        <div class="menu">
          <div class="container">
            <div class="menu__list">
              @foreach($menu as $id => $menuTitle)
                <a class="menu__link @if($documentObject['id'] === $id) active @endif" href="{{ urlProcessor::makeUrl($id) }}">{{ $menuTitle }}</a>
              @endforeach
            </div>
          </div>
        </div>
        <div class="submenu @if(request()->path() === '/') dn @endif">
          <div class="container">
            <div class="submenu__list">
              @foreach($submenu as $id => $menuTitle)
                <a class="menu__link @if($documentObject['id'] === $id) active @endif" href="{{ urlProcessor::makeUrl($id) }}">{{ $menuTitle }}</a>
              @endforeach
            </div>
          </div>
        </div>

        <main class="main">
          <div class="container">

            @yield('content')

          </div>
        </main>

        <footer class="footer">
          <div class="container">
            <div class="footer__row">

              <div class="footer__item footer__item-yandex">
                <a href="#" class="footer__link">
                  <img src="assets/images/yandex-ocenka.png" alt="Оценка на в Яндекс" title="Наша оценка в Яндекс">
                </a>
              </div>

              <div class="footer__item footer__item-karty">
                <img src="assets/images/oplata.png" alt="Способы оплаты" title="Способы оплаты">
              </div>

              <div class="footer__item footer__item-vk">
                 <a href="#" class="footer__link">
                   <img src="assets/images/vk.png" alt="ВК" title="Группа ВК">
                 </a>
              </div>

              <div class="footer__item footer__item-politics">
                <a href="/soglashenie">Соглашение о персональных данных</a>
                <a href="/politika-konfidencialnosti">Политика конфиденциальности</a>
              </div>

              <div class="footer__item footer__item-contacts">
                <a href="/kontakty">Контакты</a>
              </div>

            </div>
          </div>
        </footer>

      </div>

      <div class="mobile">
        <button class="burger"></button>
        <div class="mobile__menu">
          @foreach($menu as $id => $menuTitle)
            <a class="mobile__link @if($documentObject['id'] === $id) active @endif" href="{{ urlProcessor::makeUrl($id) }}">{{ $menuTitle }}</a>
          @endforeach
        </div>
        <div class="mobile__submenu">
          @foreach($submenu as $id => $menuTitle)
            <a class="mobile__link @if($documentObject['id'] === $id) active @endif" href="{{ urlProcessor::makeUrl($id) }}">{{ $menuTitle }}</a>
          @endforeach
        </div>

        <div class="mobile__contacts">
          <div class="mobile__time">{{ $modx->getConfig('client_time') }}</div>
          <div class="mobile__address">{{ $modx->getConfig('client_address') }}</div>
          <div class="mobile__phone">
            <a class="header__whatsapp-icon mobile__icon" href="https://wa.me/{{ $modx->getConfig('client_whatsapp') }}" target="_blank">
              <svg>
                <use href="/template/images/sprite.svg#whatsapp"></use>
              </svg>
            </a>
            <a class="header__telegram-icon mobile__icon" href="https://telegram.me/{{ $modx->getConfig('client_telegram') }}" target="_blank">
              <svg>
                <use href="/template/images/sprite.svg#telegram"></use>
              </svg>
            </a>
            <a class="mobile__number" href="tel:{{ $modx->getConfig('client_phone_+7') }}">{{ $modx->getConfig('client_phone') }}</a>
          </div>
          <div class="mobile__yandex">
            <img src="assets/images/yandex-ocenka.png" alt="Оценка на в Яндекс" title="Наша оценка в Яндекс">
          </div>
        </div>

      </div>

      <script src="/template/js/script.js"></script>
      @stack('footer')
    </body>
</html>



