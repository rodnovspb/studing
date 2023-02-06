<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>Главная страница | Печати и штампы</title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__contacts contacts">
                <div class="contacts__logo">
                    <img src="{{ asset('storage/images/decoration/logo.jpg') }}" alt="Логотип">
                </div>
                <div class="contacts__place">
                    <div class="contacts__time">пн-пт с 10:00 до 18:00</div>
                    <div class="contacts__address">Челябинск, Елькина, 63Б-102</div>
                </div>
                <div class="contacts__phone">
                    <div class="contacts__messengers">
                        <div class="contacts__whatsapp">
                            <img src="{{ asset('storage/images/decoration/whatsapp.jpg') }}" alt="">
                        </div>
                        <div class="contacts__viber">
                            <img src="{{ asset('storage/images/decoration/viber.jpg') }}" alt="">
                        </div>
                        <div class="contacts__telegram">
                            <img src="{{ asset('storage/images/decoration/telegram.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="contacts__number">
                        <a href="tel:+79514466332">89514466332</a>
                    </div>
                </div>
                <div class="contacts__email">
                        <a href="mailto:cinedrodnov@mail.ru">cinedrodnov@mail.ru</a>
                    </div>
            </div>
            <div class="header__delivery delivery">
                <div class="delivery__cities">
                    <select name="" id="">
                        <option value="">Доставить в</option>
                        <option value="">Челябинск</option>
                        <option value="">Москва</option>
                        <option value="">Санкт-Петербург</option>
                        <option value="">Южно-Сахалинск</option>
                    </select>
                </div>
                <div class="delivery__services">
                    <div class="delivery__service service-1">
                        <div class="service-1__logo">Яндекс</div>
                        <div class="service-1__description">Отправим сразу</div>
                    </div>
                    <div class="delivery__service service-2">
                        <div class="service-1__logo">Курьером</div>
                        <div class="service-1__description">Отправим завтра</div>
                    </div>
                    <div class="delivery__service service-3">
                        <div class="service-1__logo">СДЭК</div>
                        <div class="service-1__description">1 день - 200 р.</div>
                    </div>
                </div>
            </div>
            <div class="header__links">
                <a href="#">Главная</a>
                <a href="#">Каталог</a>
                <a href="#">Оплата и доставка</a>
                <a href="#">Акции</a>
                <a href="#">Контакты</a>
                <a href="#">Быстрый заказ</a>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="block1">
            <div class="container">

            </div>
        </section>
    </main>
</div>


















<a href="{{ route('clear') }}">Очистить кеш</a>














</body>
</html>
