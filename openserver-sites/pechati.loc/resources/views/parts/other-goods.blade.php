@if($othergoods)
<section class="other-goods">
  <h3>Вас также могут заинтересовать</h3>
  <div class="other-goods__wrapper">
      <button class="arrow left-arrow" id="other_left_arrow" type="button" title="предыдущие">❮</button>
      <button class="arrow right-arrow" id="other_right_arrow" type="button" title="следующие">❯</button>
      <div class="other-goods__list">
      @foreach($othergoods as $good)
        <div class="other-goods__item dn" data-price="{{ $good->price }}">
          <div class="other-goods__image">
            <label for="other_radio_{{ $good->id }}">
              <img class="other-goods__img" src="{{ $good->src }}" alt="{{ $good->alt }}" title="{{ $good->title }}">
            </label>
            <input id="other_radio_{{ $good->id }}" type="checkbox" name="other_good[]" value="{{ $good->id }}">
            <div class="other-good__price">@isset($good->price) {{ $good->price }} р @endisset</div>
          </div>
          <label class="other-goods__text" for="other_radio_{{ $good->id }}">{{ $good->name }}</label>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif



























