@extends('layouts.layout')

@section('title')Создание сайтов в г. {{ $city->name }} | Заказать разработку сайта | Цена@endsection

@section('keywords')сайт, {{ $city->name }}, создание, заказать, разработка, изготовление, заказ, под ключ, цена, стоимость@endsection

@section('description')Разработка удобного, продающего сайта в г. {{ $city->name }}. Цена от 15000 руб., срок - от 10 дней. SEO оптимизация, создание мобильной версии сайта.@endsection

@section('content')
    <div class="container page">
        <h1 class="page__title">Разработка сайтов в {{ $city->name_pred }}</h1>
        <p>В нашей веб студии можно заказать создание сайта в {{ $city->name_pred }} под ключ <img class="page-img-right" src="{{ asset('storage/images/zakazat-sozdanie-razrabotka-sajtov.svg') }}" alt="Заказать разработку сайта {{ $city->name }}" title="Заказать создание сайта {{ $city->name }}"> включая seo оптимизацию под поисковые системы. Веб сайт будет настроен для Яндекса и Гугла, самостоятельно постепенно подниматься в поисковой выдаче.</p>
        <p>Стоимость разработки от 15000 руб, цена зависит от сложности проекта. Срок изготовления от 10 рабочих дней.</p>
        <p>Заказать разработку можно по email, телеграм и вотсап.</p>

        <section class="price">
            <h2 class="price__title">Цены на создание сайта</h2>
            <ul class="price__list">
                <li class="price__item">
                    <div class="price__text">
                        <div class="price__header">Готовые</div>
                        <div class="price__desc">Домен, хостинг, установка cms. Админ-панель с самостоятельным заполнением страниц.</div>
                    </div>
                    <div class="price__cost">от 5000 руб.</div>
                </li>

                <li class="price__item">
                    <div class="price__text">
                        <div class="price__header">Одностраничные</div>
                        <div class="price__desc">Сайты-визитки, лендинги, информационные, квиз-сайты</div>
                    </div>
                    <div class="price__cost">от 15 000 руб.</div>
                </li>

                <li class="price__item">
                    <div class="price__text">
                        <div class="price__header">Многостраничные</div>
                        <div class="price__desc">Корпоративные сайты компаний, каталоги, сайты для бизнеса и организаций </div>
                    </div>
                    <div class="price__cost">от 30 000 руб.</div>
                </li>

                <li class="price__item">
                    <div class="price__text">
                        <div class="price__header">Интернет-магазин</div>
                        <div class="price__desc">Продажа товаров через интернет, функционал для онлайн-коммерции</div>
                    </div>
                    <div class="price__cost">от 30 000 руб.</div>
                </li>
            </ul>
        </section>
        <section class="works">
            <h2 class="works__title">В разработку входит</h2>
            <ul class="works__list">
                <li class="works__item">Изучение рынка, поиск лучших решений</li>
                <li class="works__item">Проработка семантического ядра</li>
                <li class="works__item">Внутренняя SEO оптимизация сайта</li>
                <li class="works__item">Разработка мобильной версии</li>
                <li class="works__item">Установка чата, метрики, вебмастера, аналитики</li>
            </ul>
        </section>


        <section class="conditions">
            <h2 class="conditions__title">Условия работы</h2>
            <p>Работаем с заключением договора, по наличной-безналичной оплате на ИП УСН 6%. Срок разработки от 10 дней, зависит от загруженности на время заказа. Для начала работ понадобится заполнить техническое задание (какие сайты нравятся и не нравятся, необходимые страницы и др.)</p>

        </section>

    </div>

    @include('parts.page_contacts')
@endsection




