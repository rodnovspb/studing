@extends('layouts.layout')

@section('content')

    @guest
        <a href="{{ route('network', ['network' => 'vkontakte']) }}">Вход через ВК</a>
    @endguest



@endsection


