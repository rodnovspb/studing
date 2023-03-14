<section class="section delivery">
          <h3>{!! $options['step_4'] ?? null !!}</h3>
          <div class="delivery__wrapper">
              <div class="delivery__list">
{{--                <div class="delivery__item">--}}
{{--                  <div class="delivery__logo">--}}
{{--                    <input class="remove_delivery" type="radio" name="delivery" value="office" id="delivery__input_1" checked>--}}
{{--                    <label for="delivery__input_1" class="delivery__label">--}}
{{--                      Забрать в офисе--}}
{{--                    </label>--}}
{{--                  </div>--}}
{{--                </div>--}}
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input class="add_delivery" type="radio" name="delivery" value="yandex" id="delivery__input_2">
                    <label for="delivery__input_2" class="delivery__label">
                      <img src="{{ secure_asset('/storage/images/yandex.png') }}" alt="яндекс доставка печатей">
                    </label>
                  </div>
                </div>
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input class="add_delivery" type="radio" name="delivery" value="sdek" id="delivery__input_3">
                    <label for="delivery__input_3" class="delivery__label">
                      <img src="{{ secure_asset('/storage/images/sdek.png') }}" alt="сдэк доставка печатей">
                    </label>
                  </div>
                </div>
                <div class="delivery__item">
                  <div class="delivery__logo">
                    <input class="add_delivery" type="radio" name="delivery" value="pochta" id="delivery__input_4">
                    <label for="delivery__input_4" class="delivery__label">
                      <img src="{{ secure_asset('/storage/images/pochta.png') }}" alt="доставка печатей почтой">
                    </label>
                  </div>
                </div>
              </div>
          </div>
        </section>
