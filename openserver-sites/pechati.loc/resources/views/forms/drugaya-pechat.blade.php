<form action="#" method="post" enctype="multipart/form-data">
  @csrf
  <section class="section section_other">
    <div>{!! $options['other_pechat'] ?? null !!}</div>
  </section>

  <section class="cases">
    <h3>{!! $options['step_1_other'] ?? null !!}</h3>
      @include('parts.selectTypeCaseBtns')

      @include('parts.cases-images')

  </section>

  <section class="section requisites">
    <div class="requisites__wrapper">
    @include('parts.attach-files')

    <div class="requisites__other">
      <div class="other__title">Пожелания</div>
      <textarea name="requisites__other" class="form-input" rows="2"></textarea>
    </div>

    <div class="requisites__contacts">
      <div class="contacts__title">Ваши контакты</div>
      <input class="form-input" type="text" name="requisites__contact">
    </div>




    </div>
  </section>

  @include('parts.delivery')

  @include('parts.order-btn')

  @include('parts.other-goods')

</form>