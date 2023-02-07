@extends('layouts.layout', ['title' => 'Главная страница'])

@section('sticky')
    <div class="sticky">
        <div class="sticky__logo">
            <a href="{{ route('index') }}">
                <img class="sticky__img" src="{{ asset('storage/images/decoration/logo.jpg') }}" alt="Логотип">
            </a>
        </div>
        <div class="sticky__place">
          <div class="sticky__time">пн-пт с 10:00 до 18:00</div>
          <div class="sticky__address">Челябинск, Елькина, 63Б-102</div>
        </div>
        <div class="sticky__phone">
          <div class="sticky__messengers">
            <div class="sticky__whatsapp">
              <img src="{{ asset('storage/images/decoration/whatsapp.jpg') }}" alt="">
            </div>
            <div class="sticky__viber">
              <img src="{{ asset('storage/images/decoration/viber.jpg') }}" alt="">
            </div>
            <div class="sticky__telegram">
              <img src="{{ asset('storage/images/decoration/telegram.jpg') }}" alt="">
            </div>
          </div>
          <div class="sticky__number">
            <a href="tel:+79514466332">89514466332</a>
          </div>
        </div>
        <div class="sticky__email">
          <a href="mailto:cinedrodnov@mail.ru">cinedrodnov@mail.ru</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main">
      <div class="container">
        <section class="display">
          <a class="display__item" href="#">
            <h1 class="display__title">Печать ИП</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Печать организации</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Штампы</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">По оттиску</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Печать врача</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Факсимиле</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Другая печать</h1>
          </a>
          <a class="display__item" href="#">
            <h1 class="display__title">Каталог</h1>
          </a>
        </section>
      </div>
    </main>
@endsection

