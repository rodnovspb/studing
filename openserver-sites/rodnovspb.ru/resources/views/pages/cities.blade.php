@extends('layouts.layout')

@section('title', 'Мы работаем во всей России')

@section('content')
    <section class="cities">
        <div class="container">
            <h1 class="page__title">Ваш город</h1>
            <div class="cities__list">
                @foreach($cities as $city)
                    <a href="{{ route('city_services', $city->slug) }}" title="Наши услуги в {{ $city->name_pred }}">{{ $city->name }}</a>
                @endforeach
            </div>
	    </div>
    </section>
@endsection
