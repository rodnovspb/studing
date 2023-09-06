<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="В нашей веб студии вы можете заказать создание сайтов в Санкт-Петербурге. Мы изучаем вашу нишу, находим интересные варианты." />
        <meta name="keywords" content="сайт, Санкт-Петербург, заказать, создание, разработка, под ключ" />
        <meta name="format-detection" content="telephone=no">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('parts.metrika')
        <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
        <title>Создание сайтов СПб. Заказать разработку сайта. Цена</title>
    </head>
    <body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__row">
                    <a href="{{ route('index') }}" class="header__logo" title="На главную">rubim-okna.ru</a>
                    <div class="header__contacts">
                        <a href="mailto:rubim-okna@mail.ru" title="Наша почта">rubim-okna@mail.ru</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main">
            <section class="creating">
                <div class="container">
                    <h1 class="creating__title">Создание сайтов в Санкт-Петербурге, заказать разработку</h1>

                    <p class="creating__text">В нашей веб студии вы можете заказать <strong>создание сайтов в Санкт-Петербурге</strong>. Перед разработкой мы изучаем вашу нишу, находим интересные варианты, собираем семантическое ядро.</p>
                    <p class="creating__text">Сроки создания сайта  - от 15 до 60 рабочих дней. Зависит от сложности проекта и нашей загруженности на время заказа. Напишите нам и мы обговорим этот вопрос</p>
                    <p class="creating__text">Разрабатываем сайты на Ларавель или готовых CMS системах (Битрикс, Wordpress, ModX). Используем технологии и языки: php, javascript, html, css, view, laravel, nodejs, redux, react.</p>

                    <h2>Мы создаем такие сайты в Санкт-Петербурге:</h2>
                    <ul class="creating__types">
                        <li>Одностраничные сайты</li>
                        <li>Сайты-визитки</li>
                        <li>Лэндинги</li>
                        <li>Интернет магазины</li>
                        <li>Корпоративные сайты</li>
                        <li>Прочие многостраничные сайты</li>
                    </ul>

                    <h2>Цены на сайты</h2>
                    <table class="creating__price">
                        <tbody>
                            <tr>
                                <td>Одностраничные сайты</td>
                                <td>от 15000 руб.</td>
                            </tr>
                            <tr>
                                <td>Сайты-лэндинги</td>
                                <td>от 15000 руб.</td>
                            </tr>
                            <tr>
                                <td>Интернет-магазины</td>
                                <td>от 40000 руб.</td>
                            </tr>
                            <tr>
                                <td>Корпоративные сайты</td>
                                <td>от 30000 руб.</td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="creating__img">
                        <img src="{{ asset('storage/images/bg-image.svg') }}" alt="Создание сайтов СПб" title="Заказать разработку сайта в Санкт-Петербурге">
                    </div>
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
