<form action="{{ route('store-order', [$data->uri]) }}" class="order-form" method="post" enctype="multipart/form-data">
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
      @include('parts.urgency')
      <div class="requisites__inn inn">
        <div class="inn__title">ИНН или ОГРН</div>
        <textarea id="inn_org" name="requisites__inn" class="form-input @error('requisites__inn') error @enderror" rows="1" maxlength="1000">{{ old('requisites__inn') }}</textarea>
      </div>
      <div class="requisites__name name">
        <div class="name__title">Наименование</div>
        <textarea id="input_name" name="requisites__name" class="form-input @error('requisites__name') error @enderror" rows="1" maxlength="255">{{ old('requisites__name') }}</textarea>
      </div>
      <div class="requisites__contacts">
        <div class="contacts__title">Ваши контакты</div>
        <input class="form-input @error('requisites__contact') error @enderror" type="text" name="requisites__contact" maxlength="255" value="{{ old('requisites__contact') }}">
      </div>
      <div class="requisites__other">
        <div class="other__title">Пожелания</div>
        <textarea name="requisites__other" class="form-input @error('requisites__other') error @enderror" rows="2" maxlength="1000">{{ old('requisites__other') }}</textarea>
      </div>

      @include('parts.attach-files')
      @include('parts.delivery')

    </div>
  </section>



  @include('parts.order-btn')

  @include('parts.other-goods')

</form>