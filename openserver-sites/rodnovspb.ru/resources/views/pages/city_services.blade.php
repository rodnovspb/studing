@extends('layouts.layout')

@section('title')Сайты, боты, калькуляторы, верстка в г. {{ $city->name }}@endsection

@section('keywords')Онлайн калькулятор для сайта, телеграм и вк бот, создание сайта, верстка, {{ $city->name }}@endsection

@section('description')Сделаем в г. {{ $city->name }}: создание сайтов на заказ, онлайн калькуляторы, телеграм и вк боты@endsection

@section('content')
    <section class="city-services">
        <div class="container">
            <h1 class="page__title">Наши услуги в {{ $city->name_pred }}</h1>
            <ul class="city-services__list">
                <li><a class="underlined" href="{{ route('site', $city->slug) }}" title="Сделать сайт на заказ в г. {{ $city->name}}">Создание сайтов</a> - разработка сайта-визитки, интернет-магазина, корпоратиного, посадочной страницы. Адаптация под мобильные устройства и поисковые системы.</li>

                <li><a class="underlined" href="{{ route('site_edit', $city->slug) }}" title="Изменение, редактирование сайта в г. {{ $city->name}}">Изменение и доработка сайта</a> - изменим стили, оптимизируем, внедрим новые возможности, исправим ошибки и многое другое</li>

                <li><a class="underlined" href="{{ route('verstka', $city->slug) }}" title="Верстка сайта в г. {{ $city->name}}">Верстка сайта</a> - сверстаем сайт по макету из фотошоп, фигмы и др. Адаптивность, кроссбраузерность.</li>

                <li><a class="underlined" href="{{ route('calculator', $city->slug) }}" title="Создание онлайн-калькулятора для г. {{ $city->name}}">Онлайн-калькулятор</a> - разработаем для Вашего сайта удобный инструмент, позволяющий рассчитывать стоимость товаров и услуг, расход материалов и т.д.</li>

                <li><a class="underlined" href="{{ route('telegram_bot', $city->slug) }}" title="Создание чат бота телеграм для г. {{ $city->name}}">Телеграм бот </a> - умный помощник отвечающий на вопросы пользователей, собирающий заявки, автоматизирующий рутинные задачи, доступный 24/7</li>

                <li><a class="underlined" href="{{ route('vk_bot', $city->slug) }}" title="Создание ВК бота для г. {{ $city->name}}">ВК бот </a> - полезный инструмент для упрощения работы с социальной сетью Вконтакте. Примерно те же задачи, что и у бота телеграм</li>
            </ul>
	    </div>
    </section>
@endsection
