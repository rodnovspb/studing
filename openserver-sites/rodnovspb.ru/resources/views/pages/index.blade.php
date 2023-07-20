@extends('layouts.layout')

@section('title', 'Заказать создание сайта | Разработка сайта под ключ')

@section('keywords')Создание сайтов, заказать сайт, разработка сайтов, изготовление сайтов@endsection

@section('description')В создании сайтов самое сложное - сделать просто@endsection

@section('content')
    <section class="creating">
        <div class="container">
            <h1 class="creating__title">Создание сайтов</h1>
            <div class="creating__subtitle">cложное делаю <span>простым</span></div>
            <ul class="creating__steps">
                <li>изучаем вашу нишу</li>
                <li>находим интересные варианты</li>
                <li>совмещаем и получаем лучшее</li>
            </ul>
	    </div>
    </section>

    <section class="types">
        <div class="container">
            <h2 class="types__title">Что делаю</h2>
            <div class="types__wrapper">
                <div class="types__item item-1">
                    <div class="types__text">
                        <h3>Одностраничные сайты</h3>
                        <div class="types__desc">Заинтересовать</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
                <div class="types__item item-2">
                    <div class="types__text">
                        <h3>Интернет-магазины</h3>
                        <div class="types__desc">Простые, понятные, удобные покупки</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
                <div class="types__item item-3">
                    <div class="types__text">
                        <h3>Многостраничные сайты</h3>
                        <div class="types__desc">Рассказать</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="result">
        <div class="container">
            <h2 class="result__title">Что будет</h2>
            <div class="result__wrapper">

            </div>
        </div>
    </section>
@endsection
