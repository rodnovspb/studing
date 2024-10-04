@extends('layout')

@section('content')

    <div class="cities__list">
        @foreach($cityNamesAndSlugs as $k => $v)
            <a class="@if($slug && $slug === $v) active @endif" href="{{ route('index', ['slug' => $v]) }}">{{ $k }}</a>
        @endforeach
    </div>


@endsection
