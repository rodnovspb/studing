@extends('layouts.layout')

@section('title', "Купить сайт в городе")

@section('keywords')купить, сайт, заказать, создание@endsection

@section('description')Купить сайт или заказать создание можно в следующих городах@endsection

@section('content')
    <section class="cities">
        <div class="container">
            <h1 class="page__title">Купить сайт или заказать создание в городе</h1>
            <div class="cities__list">
                @foreach($cities as $city)
                    <a href="{{ route('site', $city->slug) }}" title="Купить сайт {{ $city->name }}">{{ $city->name }}</a>
                @endforeach
            </div>
	    </div>
    </section>
@endsection
