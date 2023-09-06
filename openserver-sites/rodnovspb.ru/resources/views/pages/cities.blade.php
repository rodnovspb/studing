@extends('layouts.layout')

@section('title', "Выберите город")

@section('keywords')Выберите город@endsection

@section('description')Выберите город@endsection

@section('content')
    <section class="cities">
        <div class="container">
            <h1 class="page__title">Выберите город</h1>
            <div class="cities__list">
                @foreach($cities as $city)
                    <a href="{{ route('site', $city->slug) }}" title="Заказать создание сайта {{ $city->name }}">{{ $city->name }}</a>
                @endforeach
            </div>
	    </div>
    </section>
@endsection
