<div class="cases__images">
  <button class="arrow left-arrow" type="button" id="case_left_arrow" title="предыдущие">❮</button>
  <button class="arrow right-arrow" type="button" id="case_right_arrow" title="следующие">❯</button>
  @foreach($caseProducts as $product)
    <div class="cases__item dn" data-price="{{ $product->price }}" @foreach($product->subtypes as $subtype) @if($subtype->id == 4) data-often="1" @elseif($subtype->id == 5) data-aut="1" @elseif($subtype->id == 6) data-pocket="1" @elseif($subtype->id == 7) data-met="1" @endif @endforeach>
      <div class="cases__top">
        <label for="cases_radio_{{ $product->id }}" title="{{ $product->title }}">
          <img class="cases__img" src="{{ secure_asset($product->src) }}" alt="{{ $product->alt }}">
        </label>
        <input id="cases_radio_{{ $product->id }}" type="radio" name="case" value="{{ $product->id }}">
        <div class="cases__price">@isset($product->price) {{ $product->price }} р @endisset</div>
      </div>
      <div class="cases__bottom">
        <div class="cases__name">
          <label for="cases_radio_{{ $product->id }}" class="cases__title">{{ $product->name }}</label>
          <div class="cases__video">
            <a href="{{ secure_asset($product->video) }}" title="видео {{ $product->name }}" target="_blank"><img class="cases__youtube" src="{{ secure_asset('/storage/images/youtube.png')}}" alt="видео {{ $product->name }}"></a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
