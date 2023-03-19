<form action="#" class="order-form" method="post" enctype="multipart/form-data">
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
    <h3>{!! $options['step_3_vrach'] ?? null !!}</h3>
    <div class="requisites__wrapper">
      @include('parts.urgency')
      <div class="requisites__name name">
        <div class="name__title">ФИО</div>
        <input id="input_name" class="form-input" type="text" name="requisites__name">
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
      @include('parts.delivery')
    </div>
  </section>



  @include('parts.order-btn')

  @include('parts.other-goods')

</form>