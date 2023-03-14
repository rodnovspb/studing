{{--не забыть про urgency--}}

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

    @include('parts.template-images')

  </section>

  <section class="cases section">
    <h3>{!! $options['step_2'] ?? null !!}</h3>
    <div class="cases__list">
      <a href="#">Часто выбирают</a>
      <a href="#">Автоматические</a>
      <a href="#">Карманные</a>
      <a href="#">Металлические</a>
    </div>

    @include('parts.cases-images')

  </section>

  <section class="section requisites">
    <h3>{!! $options['step_3'] ?? null !!}</h3>
    <div class="requisites__wrapper">
      @include('parts.urgency_faks')
      <div class="requisites__inn inn">
        <div class="inn__title">ИНН или ОГРН</div>
        <input class="form-input" type="text" name="requisites__inn" id="inn">
      </div>
      <div class="requisites__name name">
        <div class="name__title">Наименование</div>
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

      @include('parts.attach-files')

    </div>
  </section>

  @include('parts.delivery')

  @include('parts.order-btn')

  @include('parts.other-goods')

</form>