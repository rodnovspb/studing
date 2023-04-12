<div class="requisites__urgency urgency">
        <div class="urgency__title">Срочность</div>
        <div class="urgency__time">
          <input type="radio" name="urgency" value="{{ $options['urgency_long'] }}" id="urgency__input_1" checked>
          <label for="urgency__input_1" class="urgency__label urgency__long mark" data-price="{{ $options['urgency_long_price'] }}">{{ $options['urgency_long'] }} @if($options['urgency_long_price'] != 0) <span style="vertical-align: top; font-size: 80%;">(+{{ $options['urgency_long_price'] }} р.)</span> @endif</label>
          <input type="radio" name="urgency" value="{{ $options['urgency_middle_faksimile'] }}" id="urgency__input_2">
          <label for="urgency__input_2" class="urgency__label urgency__middle" data-price="{{ $options['urgency_middle_faksimile_price'] }}">{{ $options['urgency_middle_faksimile'] }} @if($options['urgency_middle_faksimile_price'] != 0) <span style="vertical-align: top; font-size: 80%;">(+{{ $options['urgency_middle_faksimile_price'] }} р.)</span> @endif</label>
          <input type="radio" name="urgency" value="{{ $options['urgency_fast_faksimile'] }}" id="urgency__input_3">
          <label for="urgency__input_3" class="urgency__label urgency__fast" data-price="{{ $options['urgency_fast_faksimile_price'] }}">{{ $options['urgency_fast_faksimile'] }} <span style="vertical-align: top; font-size: 80%;">(+{{ $options['urgency_fast_faksimile_price'] }} р.)</span></label>
        </div>
</div>
