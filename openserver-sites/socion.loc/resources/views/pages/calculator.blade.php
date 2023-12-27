@extends('layouts.layout')

@section('title', 'Калькулятор признаков Рейнина по соционике')
@section('description', 'Калькулятор признаков Рейнина по соционике')
@section('keywords', 'Калькулятор признаков Рейнина по соционике')

@section('content')

  <section class="calculator">
    <h1>Калькулятор признаков Рейнина</h1>
    <div class="calculator__block">

      <div class="calculator__left">
        <div class="calculator__row">
          <div data-num="1">Экстраверсия</div>
          <div data-num="2">Интроверсия</div>
        </div>
        <div class="calculator__row">
          <div data-num="3">Интуиция</div>
          <div data-num="4">Сенсорика</div>
        </div>
        <div class="calculator__row">
          <div data-num="5">Логика</div>
          <div data-num="6">Этика</div>
        </div>
        <div class="calculator__row">
          <div data-num="7">Рациональность</div>
          <div data-num="8">Иррациональность</div>
        </div>
        <div class="calculator__row">
          <div data-num="9">Статика</div>
          <div data-num="10">Динамика</div>
        </div>
        <div class="calculator__row">
          <div data-num="11">Позитивизм</div>
          <div data-num="12">Негативизм</div>
        </div>
        <div class="calculator__row">
          <div data-num="13">Квестимность</div>
          <div data-num="14">Деклатимность</div>
        </div>
        <div class="calculator__row">
          <div data-num="15">Тактика</div>
          <div data-num="16">Стратегия</div>
        </div>
        <div class="calculator__row">
          <div data-num="17">Конструктивизм</div>
          <div data-num="18">Эмотивизм</div>
        </div>
        <div class="calculator__row">
          <div data-num="19">Процесс</div>
          <div data-num="20">Результат</div>
        </div>
        <div class="calculator__row">
          <div data-num="21">Уступчивость</div>
          <div data-num="22">Упрямость</div>
        </div>
        <div class="calculator__row">
          <div data-num="23">Беспечность</div>
          <div data-num="24">Предусмотрительность</div>
        </div>
        <div class="calculator__row">
          <div data-num="25">Рассудительность</div>
          <div data-num="26">Решительность</div>
        </div>
        <div class="calculator__row">
          <div data-num="27">Субъективизм</div>
          <div data-num="28">Объективизм</div>
        </div>
        <div class="calculator__row">
          <div data-num="29">Аристократизм</div>
          <div data-num="30">Демократизм</div>
        </div>
        <div class="clean">Очистить</div>
      </div>

      <div class="calculator__right">
        <div data-type="1">Дон Кихот</div>
        <div data-type="2">Дюма</div>
        <div data-type="3">Гюго</div>
        <div data-type="4">Робеспьер</div>
        <div data-type="5">Гамлет</div>
        <div data-type="6">Максим Горький</div>
        <div data-type="7">Жуков</div>
        <div data-type="8">Есенин</div>
        <div data-type="9">Наполеон</div>
        <div data-type="10">Бальзак</div>
        <div data-type="11">Джек Лондон</div>
        <div data-type="12">Драйзер</div>
        <div data-type="13">Штирлиц</div>
        <div data-type="14">Достоевский</div>
        <div data-type="15">Гексли</div>
        <div data-type="16">Габен</div>
      </div>
    </div>
{{--    <div class="calculator__idea">Идея калькулятора -<a href="https://mysocio.ru/test/reinin" target="_blank">mysocio.ru/test/reinin</a></div>--}}
  </section>
@endsection




