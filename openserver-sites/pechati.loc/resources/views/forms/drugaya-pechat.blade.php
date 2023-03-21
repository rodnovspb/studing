<form action="{{ route('store-order', [$data->uri]) }}" method="post" enctype="multipart/form-data" class="order-form">
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
      <textarea name="requisites__other"  class="form-input @error('requisites__other') error @enderror" rows="2" maxlength="1000">{{ old('requisites__other') }}</textarea>
    </div>

    <div class="requisites__contacts">
      <div class="contacts__title">Ваши контакты</div>
      <input class="form-input @error('requisites__contact') error @enderror" type="text" name="requisites__contact" maxlength="255">
    </div>

    @include('parts.delivery')


    </div>
  </section>

  @include('parts.order-btn')

  @include('parts.other-goods')

</form>