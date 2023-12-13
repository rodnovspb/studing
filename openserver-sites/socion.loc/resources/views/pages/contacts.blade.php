@extends('layouts.layout')

@section('title', 'Контакты | СОЦИОН.РФ')
@section('description', 'Контакты | СОЦИОН.РФ')
@section('keywords', 'Контакты')

@section('content')
  <h1>Контакты</h1>
  <div class="text">Электронная почта: <a href="mailto:socion@internet.ru" title="Наша почта">socion@internet.ru</a></div>
    <div class="text">Телеграм: <a href="https://telegram.me/soc_typing" target="_blank">{{"@"}}{{ config('custom.telegram') }}</a></div>
@endsection



