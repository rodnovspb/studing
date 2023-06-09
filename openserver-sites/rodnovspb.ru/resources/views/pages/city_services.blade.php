@extends('layouts.layout')

@section('title')Наши услуги в {{ $city->name_pred }}@endsection

@section('keywords')Наши услуги в {{ $city->name_pred }}@endsection

@section('description')Мы предлагаем такие услуги в  {{ $city->name_pred }}@endsection

@section('content')
    <section class="city-services">
        <div class="container">
            <h1 class="page__title">Наши услуги в {{ $city->name_pred }}</h1>
            <ul class="city-services__list">
                <li><a class="underlined" href="{{ route('calculator', $city->slug) }}" title="Создание онлайн-калькулятора для г. {{ $city->name}}">Создание онлайн-калькулятора</a></li>
            </ul>
	    </div>
    </section>
@endsection
