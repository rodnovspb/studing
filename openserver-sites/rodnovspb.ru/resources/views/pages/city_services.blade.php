@extends('layouts.layout')

@section('content')
    <section class="city-services">
        <div class="container">
            <h1 class="page__title">Наши услуги в {{ $city->name_pred }}</h1>
            <ul class="city-services__list">
                <li><a href="{{ route('site', $city->slug) }}" title="О создании сайта в {{ $city->name_pred }}">Создание сайта</a></li>
                <li><a href="{{ route('calculator', $city->slug) }}" title="О создании онлайн-калькулятора в {{ $city->name_pred }}">Создание онлайн-калькулятора</a></li>
                <li><a href="{{ route('bot', $city->slug) }}" title="О создании бота в {{ $city->name_pred }}">Создание бота</a></li>
            </ul>
	    </div>
    </section>
@endsection
