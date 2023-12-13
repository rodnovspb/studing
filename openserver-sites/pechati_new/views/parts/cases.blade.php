@isset($cases)
<div class="cases order-step">
  <div class="step-title">{{ $documentObject['choose_case'] }}</div>
  <div class="step-container">
    <div class="slider-container slider-container-case">
       <div class="swiper-wrapper">

         @foreach($cases as $case)
           <div class="swiper-slide">
           <div class="slide-block">
             <div class="slide__top">
                <input type="radio" class="slide__input" id="case_{{$loop->index}}" name="case" value="{{$case->id}}" data-price="{{$case->price}}">
                <label class="slide__label" for="case_{{$loop->index}}">
                  <img class="slide__img case__img" src="{{ $case->img }}" alt="{{$case->alt}}">
                </label>
                <div class="slide__price case__price">{{$case->price ? $case->price . ' ₽'  : null}}</div>
             </div>
             <div class="slide__bottom">
               <label class="slide__name" for="case_{{$loop->index}}">{{ $case->name }}</label>
               @if($case->link_video)
               <a class="slide__youtube" href="{{ $case->link_video }}" target="_blank"><img src="/template/images/youtube.png" title="Смотреть видео"></a>
               @endif
             </div>
           </div>
          </div>
         @endforeach
       </div>
    </div>
    <div class="slider__buttons">
      <button class="button-prev button-prev-case">❮</button>
      <button class="button-next button-next-case">❯</button>
    </div>
  </div>
</div>
@endisset
