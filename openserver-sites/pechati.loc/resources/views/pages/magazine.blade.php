@extends('layouts.layout')

@section('sticky-inner')
    @include('parts.sticky-inner')
@endsection

@section('content')
<main class="main main-page">
    <div class="container">
    {!! $data->content !!}
    {!! $options['order_methods'] !!}

        <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <section class="templates">
            <h3>{!! $options['step_1'] ?? null !!}</h3>
            <div class="templates__list">
                <a href="#">Стандартные (22 шт.)</a>
                <a href="#">Дизайнерские (15 шт.)</a>
                <a href="#">С лого и цветные (9 шт.)</a>
                <a href="#">Все (52 шт.)</a>
            </div>

            <div class="templates__images">
                <button class="arrow left-arrow" type="button">❮</button>
                <button class="arrow right-arrow" type="button">❯</button>
                @for($i=1; $i<=6; $i++)
                    <div class="templates__item">
                        <div class="templates__number">{{ $i }}</div>
                        <label for="templates_radio_{{ $i }}">
                            <img class="templates__img" src="https://via.placeholder.com/300x300/33CCFF/FFF/" alt="" style="border-radius: 50%">
                        </label>
                        <input id="templates_radio_{{ $i }}" type="radio" name="template" value="{{ $i }}">
                        <div class="templates__price">300 р</div>
                    </div>
                @endfor
            </div>
        </section>

        <section class="cases">
            <h3>{!! $options['step_2'] ?? null !!}</h3>
            <div class="cases__list">
                <a href="#">Часто выбирают</a>
                <a href="#">Автоматические</a>
                <a href="#">Карманные</a>
                <a href="#">Металлические</a>
            </div>

            <div class="cases__images">
                <button class="arrow left-arrow" type="button">❮</button>
                <button class="arrow right-arrow" type="button">❯</button>
                @for($i=1; $i<=6; $i++)
                    <div class="cases__item">
                        <div class="cases__top">
                            <label for="cases_radio_{{ $i }}">
                                <img class="cases__img" src="https://i.ibb.co/hK3WwWJ/shiny.png" alt="">
                            </label>
                        <input id="cases_radio_{{ $i }}" type="radio" name="case" value="{{ $i }}">
                        <div class="cases__price">300 р</div>
                        </div>
                        <div class="cases__bottom">
                            <div class="cases__name">
                                <div class="cases__title">Shiny-542</div>
                                <div class="cases__video">
                                    <a href="#"><img class="cases__youtube" src="/storage/images/youtube.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </section>

        <section class="requisites">
            <h3>{!! $options['step_3'] ?? null !!}</h3>
            <div style="text-align: center;">Блок с реквизитами</div>
            <button id="inn" type="button">Получить</button>
        </section>

      <section class="delivery">
            <h3>{!! $options['step_4'] ?? null !!}</h3>
            <div style="text-align: center;">Блок доставки</div>
      </section>

      <section class="order-btn">
            <div class="dfc">
                <h3>Общая стоимость</h3>
                <button type="submit">Заказать</button>
                <button>Добавить в корзину</button>
            </div>
      </section>

      <section class="other-goods">
            <h3>Вас также могут заинтересовать</h3>
      </section>

      </form>







  </div>
</main>
@endsection
