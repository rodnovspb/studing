@extends('layouts.layout')

@section('title', 'Соционика - типирование личности | 10 лет опыта')
@section('description', 'Около 10 лет занимаюсь соционикой и могу назвать себя специалистом в области соционического типирования личности. Типирую по функциям и признакам Рейнина отслеживая их при общении.')
@section('keywords', 'Соционика, типирование, специалист, стоимость')

@section('content')

  <div class="container">

  <section class="typing" id="typing">
    <h1 class="page__title">Типирование личности по соционике</h1>
    <p>Меня зовут Максим, я около 10 лет занимаюсь соционикой и могу назвать себя специалистом в области соционического типирования личности. Типирую по функциям и признакам Рейнина отслеживая их при общении.</p>

    <h2 class="page__subtitle">Варианты типирования</h2>
    <ul class="ordered typing__list">
      <li>
        <h3 class="typing__option">Типирование по опроснику и присланному видео</h3>
        <div>
          <p>От вас понадобится <a href="{{ route('questionnaire') }}">заполнить анкету</a>, а также видео на 20-30 минут с записью ответов на вопросы, либо жизнеописанием в свободной форме. По итогу получите письменный разбор видео с указанием социотипа. Если будут сомнения, то связываемся в телеграм и задаю дополнительные вопросы.</p>
          <p>Стоимость - 1000 руб.</p>
        </div>
      </li>
      <li>
        <h3 class="typing__option">Типирование по голосовой связи</h3>
        <div>
          <p>Типирование проходит в виде разговора по голосовой связи, занимает около 1,5 часа. По вашему желанию при общении могу сразу обозначать ваши стороны и переводить их на соционический язык, либо - по итогу разговора.</p>
          <p>Перед типированием по желанию можете <a href="{{ route('questionnaire') }}">заполнить анкету</a>. Она нужна для того, чтобы быстро познакомиться,  примерно понять вас и чтобы были отправные точки разговора. Заполнять ее можете по желанию. Практика показывает, что результаты тестов и то, как человек отвечает на вопросы анкеты зачастую говорят о представлениях человека о себе, а не о том, что есть на самом деле.</p>
          <p>Также желательно, чтобы вы прислали вашу фотографию или записали видео.</p>
          <p>Стоимость - 2500 руб.</p>
        </div>
      </li>
    </ul>
    <h2 class="page__subtitle">Как записаться</h2>
     <p>Для того, чтобы записаться напишите на электронную почту <a href="mailto:socion@internet.ru">socion@internet.ru</a> или в телеграм: <a href="https://telegram.me/{{ config('custom.telegram') }}" target="_blank">{{'@'}}{{ config('custom.telegram') }}</a>.</p>
    <p>Оплата вносится перед типированием. Для определения социотипа по голосовой связи понадобится выбрать время в сетке типирования.</p>
    <p>При необходимости предоставлю отзывы.</p>
    <h2 class="page__subtitle">Чем полезно соционическое типирование</h2>
    <ul class="tests__list">
        <li>Понимание своих сильных и слабых сторон, врожденных задатков</li>
        <li>Правильный выбор профессии, понимание в каких областях работать</li>
        <li>Понимание и прогнозирование отношений с людьми</li>
        <li>Понимание страхов, неуверенности по своей болевой функции</li>
    </ul>
  </section>

</div>

@endsection


