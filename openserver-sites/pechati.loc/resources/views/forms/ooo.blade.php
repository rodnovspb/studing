<form action="#" method="post" enctype="multipart/form-data">
  @csrf
  <section class="templates section">
    <h3>{!! $options['step_1'] ?? null !!}</h3>
    @include('parts.selectTypeTemplateBtns')
    @include('parts.template-images')
  </section>

  <section class="cases section">
    <h3>{!! $options['step_2'] ?? null !!}</h3>
    @include('parts.selectTypeCaseBtns')

    @include('parts.cases-images')

  </section>

  <section class="section requisites">
    <h3>{!! $options['step_3'] ?? null !!}</h3>
    <div class="requisites__wrapper">
      <div class="requisites__urgency urgency">
        <div class="urgency__title">Срочность</div>
        <div class="urgency__time">
          <input type="radio" name="urgency" value="4hour" id="urgency__input_1" checked>
          <label for="urgency__input_1" class="urgency__label urgency__4hour mark" data-price="0">4 часа</label>
          <input type="radio" name="urgency" value="30min" id="urgency__input_2">
          <label for="urgency__input_2" class="urgency__label urgency__30min" data-price="{{ $options['stand_urgency_price'] }}">30 минут <span style="vertical-align: top; font-size: 80%;">(+{{ $options['stand_urgency_price'] }} р.)</span></label>
        </div>
      </div>
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