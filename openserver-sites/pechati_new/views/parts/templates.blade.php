@if($templates)
  <div class="templates order-step">
  <div class="step-title">{{ $documentObject['choose_template'] }}</div>
  <div class="step-container">
    <div class="slider-container slider-container-template">
       <div class="swiper-wrapper">
         @foreach($templates as $template)
           <div class="swiper-slide">
           <div class="slide-block">
             <div class="slide__top">
             <input type="radio" class="slide__input" id="template_{{$loop->index}}" name="template" value="{{$template['img']}}" data-price="{{$template['price']}}">
              <label class="slide__label" for="template_{{$loop->index}}">
                <img class="slide__img template__img @if($documentObject['id'] == 7) border-radius-unset @elseif($documentObject['id'] == 5) border-radius-unset big-scale @endif "
                     src="{{ $template['img'] }}" alt="{{$template['alt']}}">
              </label>
              @if($documentObject['id'] != 7 && $documentObject['id'] != 5)
                 <div class="slide__number template__number">{{$loop->iteration}}</div>
              @endif
              <div class="slide__price template__price">{{ $template['price'] ? $template['price'] . ' ₽'  : null }}</div>
             </div>
           </div>
          </div>
         @endforeach

       </div>
    </div>
    <div class="slider__buttons">
      <button class="button-prev button-prev-template">❮</button>
      <button class="button-next button-next-template">❯</button>
    </div>
  </div>
</div>
@endif
