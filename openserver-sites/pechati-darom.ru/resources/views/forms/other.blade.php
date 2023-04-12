<form action="{{ route('store-order', [$data->uri]) }}" class="order-form" method="post" enctype="multipart/form-data">
  @csrf
  <section class="templates section">
    <h3>{!! $options['step_1'] ?? null !!}</h3>

    @include('parts.template-images')

  </section>

  <section class="cases section">
    <h3>{!! $options['step_2'] ?? null !!}</h3>

    @include('parts.cases-images')

  </section>

  <section class="section requisites">
    <h3>Заполните, пожалуйста, форму</h3>
    <div class="requisites__wrapper">
      <div class="requisites__other">
        <div class="other__title">Описание заказа</div>
        <textarea name="requisites__other" class="form-input @error('requisites__other') error @enderror" rows="3" maxlength="1000">{{ old('requisites__other') }}</textarea>
      </div>

      @include('parts.attach-files')

      <div class="requisites__contacts">
        <div class="contacts__title">Ваши контакты</div>
        <input class="form-input @error('requisites__contact') error @enderror" type="text" name="requisites__contact" maxlength="255" value="{{ old('requisites__contact') }}">
      </div>

      @include('parts.delivery')

    </div>
  </section>


  @include('parts.order-btn')

  @include('parts.other-goods')

</form>
