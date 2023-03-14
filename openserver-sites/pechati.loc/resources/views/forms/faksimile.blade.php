<form action="#" method="post" enctype="multipart/form-data">
  @csrf

<section class="section">
    <h3>{!! $options['step_1_faksimile'] ?? null !!}</h3>
    <div style="text-align: center; margin-bottom: 10px; margin-top: -7px;">{!! $options['step_1_stamp_subtype'] ?? null !!}</div>

<div class="faksimile__images">
      @foreach($stampProducts as $product)
    <div class="faksimile__item" data-price="{{ $product->price }}">
        <label for="faksimile_radio_{{ $product->id }}">
         <img class="faksimile__img" src="{{ secure_asset($product->src) }}" alt="{{ $product->alt }}" title="{{ $product->title }}">
       </label>
       <input id="faksimile_radio_{{ $product->id }}" type="radio" name="faksimile" value="{{ $product->id }}">
       <div class="faksimile__price">@isset($product->price) {{ $product->price }} р @endisset</div>
    </div>
  @endforeach
</div>
</section>

<section class="section requisites">
  <div class="requisites__wrapper">
    @include('parts.urgency_faks')
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