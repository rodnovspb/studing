<div class="requisites__delivery">
        <div class="delivery__wrapper">
          <div class="delivery__title">Нужна доставка?</div>
          <div class="delivery__list">
            @foreach($deliveries as $delivery)
              <div class="delivery__item" style="flex-basis: {{ (100/$deliveries->count()) - 3 }}%" data-price="0" data-text = "{{ $delivery->placeholder }}" title="{{ $delivery->title }}">
                  <div class="delivery__logo">
                    <input class="add_delivery" type="radio" name="delivery" value="{{ $delivery->id }}" id="delivery__input_{{ $delivery->id }}">
                    <label for="delivery__input_{{ $delivery->id }}" class="delivery__label">
                      <img src="{{ secure_asset($delivery->src) }}" alt="{{ $delivery->alt }}">
                    </label>
                  </div>
                </div>
            @endforeach
              </div>
        </div>
        <textarea name="requisites__address" class="delivery__address form-input dn" rows="2"></textarea>
      </div>
