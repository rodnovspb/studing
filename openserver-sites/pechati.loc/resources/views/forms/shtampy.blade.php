<form action="#" method="post" enctype="multipart/form-data">
  @csrf
  <section class="section">
    <h3>{!! $options['step_1_stamp'] ?? null !!}</h3>
    <div style="text-align: center; margin-bottom: 10px; margin-top: -7px;">{!! $options['step_1_stamp_subtype'] ?? null !!}</div>

<div class="stamp__images">
      @foreach($stampProducts as $product)
        <div class="stamp__item" data-price="{{ $product->price }}">
        <label for="stamp_radio_{{ $product->id }}">
         <img class="stamp__img" src="{{ $product->src }}" alt="{{ $product->alt }}" title="{{ $product->title }}">
       </label>
       <input id="stamp_radio_{{ $product->id }}" type="radio" name="stamp" value="{{ $product->id }}">
       <div class="stamp__price">@isset($product->price) {{ $product->price }} р @endisset</div>
    </div>
      @endforeach
</div>
</section>


  <section class="section requisites">
    <h3>{!! $options['step_2_stamp'] ?? null !!}</h3>
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
      <div class="requisites__text">
        <div class="text__title">Текст штампа</div>
        <textarea name="requisites__text" class="form-input" rows="2"></textarea>
      </div>
      <div class="requisites__other">
        <div class="other__title">Пожелания</div>
        <textarea name="requisites__other" class="form-input" rows="2"></textarea>
      </div>
      <div class="requisites__contacts">
        <div class="contacts__title">Ваши контакты</div>
        <input class="form-input" type="text" name="requisites__contact">
      </div>

      @include('parts.attach-files')

    </div>
  </section>

  @include('parts.delivery')

  @include('parts.order-btn')

  @include('parts.other-goods')

</form>