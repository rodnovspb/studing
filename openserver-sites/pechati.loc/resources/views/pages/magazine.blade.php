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
        <section class="templates section">
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
                  <img class="templates__img" src="https://via.placeholder.com/300x300/33CCFF/FFF/" alt=""
                       style="border-radius: 50%">
                </label>
                <input id="templates_radio_{{ $i }}" type="radio" name="template" value="{{ $i }}">
                <div class="templates__price">300 р</div>
              </div>
            @endfor
          </div>
        </section>

        <section class="cases section">
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
                    <label for="cases_radio_{{ $i }}" class="cases__title">Shiny-542</label>
                    <div class="cases__video">
                      <a href="#"><img class="cases__youtube" src="/storage/images/youtube.png" alt=""></a>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </section>

        <section class="section requisites">
          <h3>{!! $options['step_3'] ?? null !!}</h3>
          <div class="requisites__wrapper">
            <div class="requisites__urgency urgency">
              <div class="urgency__title">Срочность</div>
              <div class="urgency__time">
                <input type="radio" name="urgency" value="4hour" id="urgency__input_1" checked><label for="urgency__input_1" class="urgency__label urgency__4hour">4 часа</label>
                <input type="radio" name="urgency" value="30min" id="urgency__input_2"><label for="urgency__input_2" class="urgency__label urgency__30min">30 минут <span style="vertical-align: top; font-size: 80%;">(+350 р.)</span></label>
              </div>
            </div>
              <div class="requisites__inn inn">
                <div class="inn__title">ИНН или ОГРН</div>
                <input class="form-input" type="text" name="requisites__inn" id="inn">
            </div>
            <div class="requisites__inn inn">
              <div class="inn__title">Наименование</div>
              <input id="input_name" class="form-input" type="text" name="requisites__name" placeholder="ИП Фамилия Имя Отчество">
            </div>
            <div class="requisites__contacts">
              <div class="contacts__title">Ваши контакты</div>
              <input class="form-input" type="text" name="requisites__contact">
            </div>
            <div class="requisites__other">
              <div class="other__title">Пожелания</div>
                <textarea name="requisites__other" class="form-input" rows="2"></textarea>
            </div>
            <div class="requisites__files files">
              <div class="file__wrapper">
                <label class="requisites__file label_file">Прикрепить файл<input class="attach_input" name="files[]" type="file"></label>
                <ul class="file__list">
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="section delivery">
          <h3>{!! $options['step_4'] ?? null !!}</h3>
          <div class="delivery__wrapper">
              <div class="delivery__list">
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input type="radio" name="delivery" value="office" id="delivery__input_1" checked>
                    <label for="delivery__input_1" class="delivery__label">
                      Забрать в офисе
                    </label>
                  </div>
                </div>
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input type="radio" name="delivery" value="yandex" id="delivery__input_2">
                    <label for="delivery__input_2" class="delivery__label">
                      <img src="/storage/images/yandex.png" alt="">
                    </label>
                  </div>
                </div>
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input type="radio" name="delivery" value="sdek" id="delivery__input_3">
                    <label for="delivery__input_3" class="delivery__label">
                      <img src="/storage/images/sdek.png" alt="">
                    </label>
                  </div>
                </div>
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input type="radio" name="delivery" value="pochta" id="delivery__input_4">
                    <label for="delivery__input_4" class="delivery__label">
                      <img src="/storage/images/pochta.png" alt="">
                    </label>
                  </div>
                </div>
              </div>
          </div>
        </section>

        <div class="order-btn">
          <div class="order-btn__wrapper">
            <h3 class="order-btn__cost">Общая стоимость: 800 ₽</h3>
            <div class="order-btn__block">
              <button class="order-btn__button order-btn__send" type="submit">Заказать</button>
              <button class="order-btn__button order-btn__cart" type="button">Добавить в корзину</button>
            </div>
          </div>
        </div>

        <section class="other-goods">
          <h3>Вас также могут заинтересовать</h3>
          <div class="other-goods__wrapper">
            <div class="other-goods__list">
              <button class="arrow left-arrow" id="other_left_arrow" type="button">❮</button>
              <button class="arrow right-arrow" id="other_right_arrow" type="button">❯</button>
              @for($i = 0; $i < 8; $i++)
                <div class="other-goods__item">
                  <div class="other-goods__image">
                    <label for="other_radio_{{ $i }}">
                      <img class="other-goods__img" src="https://pechati-m.com/wp-content/uploads/2019/12/izgotovlenie_jelektronnoj_pechati.jpg" alt="">
                    </label>
                    <input id="other_radio_{{ $i }}" type="checkbox" name="other_good_{{ $i }}" value="{{ $i }}">
                    <div class="other-good__price">300 р.</div>
                  </div>
                  <label class="other-goods__text" for="other_radio_{{ $i }}">Синяя печать в электронном виде</label>
                </div>
              @endfor
            </div>
          </div>
        </section>

      </form>

    </div>
  </main>
@endsection

