<div class="requisites order-step">
  @if($documentObject['fill_fields'])
    <div class="step-title">{{ $documentObject['fill_fields'] }}</div>
  @endif
  <div class="step-container">
  <div class="requisites__block">

    @if($urgency)
    <div class="requisites__row">
      <div class="requisites__title">Срочность</div>
      <div class="requisites__field urgency">
        @foreach($urgency as $k=>$arr)
        <input class="urgency__input" id="urgency_{{$k}}" type="radio" name="urgency" hidden @if($arr['value'] == 0) checked @endif data-price="{{$arr['value']}}" value="{{ $arr['key'] }} @if($arr['value']) +{{ $arr['value'] }} руб. @endif">
        <label for="urgency_{{$k}}" class="urgency__label">
          {{$arr['key']}}
          @if($arr['value'])<span>(+{{$arr['value']}} р.)</span>@endif
        </label>
        @endforeach
      </div>
    </div>
    @endif

    @if($text_inn)
    <div class="requisites__row">
      <div class="requisites__title">{{ $text_inn }}</div>
      <div class="requisites__field">
        <textarea class="requisites__inn" name="inn" maxlength="255" rows="1"></textarea>
      </div>
    </div>
    @endif

    @if($name)
    <div class="requisites__row">
      <div class="requisites__title">{{ $name }}</div>
      <div class="requisites__field">
        <input class="requisites__name" type="text" name="name" maxlength="255">
      </div>
    </div>
    @endif

    <div class="requisites__row">
      <div class="requisites__title">Ваши контакты</div>
      <div class="requisites__field">
        <input class="requisites__contacts" type="text" name="contact" maxlength="255">
      </div>
    </div>

    <div class="requisites__row">
      <div class="requisites__title">Пожелания</div>
      <div class="requisites__field">
        <textarea class="requisites__other" name="other" maxlength="255" rows="2"></textarea>
      </div>
    </div>

    <div class="requisites__row">
      <div class="requisites__title"></div>
      <div class="requisites__field file">
        <label class="file__label" for="file__input">Прикрепить файл</label>
        <input id="file__input" type="file" name="files[]" multiple hidden>
        <div class="file__name">
          <span id="file__text"></span>
          <button id="file__delete" class="dn" type="button">╳</button>
        </div>
      </div>
    </div>

    @if($deliveries)
    <div class="requisites__row">
      <div class="requisites__title">Доставка</div>
      <div class="requisites__field">
        <div class="requisites__delivery delivery">
          <div class="delivery__list">
            @foreach($deliveries as $k => $arr)
            <input id="delivery_{{$k}}" class="delivery__input" type="radio" name="delivery" hidden @if($k == 0) checked @endif value="{{ $arr['title'] }}">
            <label for="delivery_{{$k}}" class="delivery__label"
              @if($k == 0) data-default @endif
              data-text="{{$arr['text']}}">
              @if($arr['img']) <img src="{{$arr['img']}}" alt="{{ $arr['title'] }}" draggable="false">
              @else {{ $arr['title'] }}
              @endif
            </label>
            @endforeach
          </div>
          <textarea class="delivery__text dn" name="delivery_text" rows="2" maxlength="255"></textarea>
        </div>
      </div>
    </div>
    @endif
    <div class="requisites__row checkout">
      @if($documentObject['show_cost'] === "true")
      <input type="hidden" id="hidden_cost" name="cost">
      <div class="checkout__cost">
        <div class="checkout__title">Стоимость:</div>
        <div class="checkout__text dn">
          <span class="checkout__num"></span>
          <span class="checkout__delivery dn">+ доставка</span>
        </div>
      </div>
      @endif
      <button class="checkout__button" type="submit">Заказать</button>
      </div>
    </div>

  </div>

</div>
