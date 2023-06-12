@extends('layouts.layout')

@section('title')Наши услуги в {{ $city->name_pred }}@endsection

@section('keywords')Онлайн калькулятор для сайта, телеграм и вк бот{{ $city->name_pred }}@endsection

@section('description')Наши услуги в {{ $city->name_pred }}: онлайн калькуляторы, телеграм и вк боты, @endsection

@section('content')
    <section class="city-services">
        <div class="container">
            <h1 class="page__title">Наши услуги в {{ $city->name_pred }}</h1>
            <ul class="city-services__list">

                <li><a class="underlined" href="{{ route('calculator', $city->slug) }}" title="Создание онлайн-калькулятора для г. {{ $city->name}}">Онлайн-калькулятор</a> - разработаем для Вашего сайта удобный инструмент, позволяющий рассчитывать стоимость товаров и услуг, расход материалов и т.д.</li>

                <li><a class="underlined" href="{{ route('telegram_bot', $city->slug) }}" title="Создание чат бота телеграм для г. {{ $city->name}}">Телеграм бот </a> - умный помощник отвечающий на вопросы пользователей, собирающий заявки, автоматизирующий рутинные задачи, доступный 24/7</li>

                <li><a class="underlined" href="{{ route('vk_bot', $city->slug) }}" title="Создание ВК бота для г. {{ $city->name}}">ВК бот </a> - полезный инструмент для упрощения работы с социальной сетью Вконтакте. Примерно те же задачи, что и у бота телеграм</li>
            </ul>
	    </div>
    </section>
@endsection
