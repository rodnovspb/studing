<form action="#" class="order-form" method="post" enctype="multipart/form-data">
  @csrf
<section class="section">
    <h3>{!! $options['step_1_stamp'] ?? null !!}</h3>
    <div style="text-align: center; margin-bottom: 10px; margin-top: -7px;">{!! $options['step_1_stamp_subtype'] ?? null !!}</div>

<div class="stamp__images">
      @foreach($stampProducts as $product)
        <div class="stamp__item" data-price="{{ $product->price }}">
        <label for="stamp_radio_{{ $product->id }}">
         <img class="stamp__img" src="{{ secure_asset($product->src) }}" alt="{{ $product->alt }}" title="{{ $product->title }}">
       </label>
       <input id="stamp_radio_{{ $product->id }}" type="radio" name="template_stamp" value="{{ $product->id }}">
       <div class="stamp__price">@isset($product->price) {{ $product->price }} р @endisset</div>
    </div>
      @endforeach
</div>
</section>


  <section class="section requisites">
    <h3>{!! $options['step_2_stamp'] ?? null !!}</h3>
    <div class="requisites__wrapper">
      @include('parts.urgency')
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
      @include('parts.delivery')
    </div>
  </section>



  @include('parts.order-btn')

  @include('parts.other-goods')

</form>