@extends('layouts.layout')

@section('content')
    <main class="main main-index">
      <div class="container">
        <section class="display">
          <a class="display__item" href="{{ route('ip') }}">
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

