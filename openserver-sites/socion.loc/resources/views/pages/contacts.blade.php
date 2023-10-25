@extends('layouts.layout')

@section('title', 'социон.рф | Контакты')
@section('description', 'социон.рф | Контакты')
@section('keywords', 'Контакты')

@section('content')

  <div class="container">

  <section class="contacts">
    <h1 class="page__title">Контакты</h1>
    <div class="contacts__info">
      <div class="contacts__email">Электронная почта: <a href="mailto:socion@internet.ru" title="Наша почта">socion@internet.ru</a></div>
    <div class="contacts__tg">Телеграм: <a href="https://telegram.me/soc_typing" target="_blank">{{"@"}}{{ config('custom.telegram') }}</a></div>
    </div>

  </section>

</div>

@endsection



