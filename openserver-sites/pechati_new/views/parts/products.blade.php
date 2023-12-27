@isset($products)
<div class="products order-step">
  <div class="step-title">Может понадобится</div>
  <div class="step-container">
    <div class="slider-container slider-container-product">
       <div class="swiper-wrapper">

         @foreach($products as $product)
           <div class="swiper-slide">
           <div class="slide-block">
             <div class="slide__top">
                <input type="checkbox" class="slide__input" id="product_{{$loop->index}}" name="products[]" value="{{$product->id}}" data-price="{{$product->price}}">
                <label class="slide__label" for="product_{{$loop->index}}">
                  <img class="slide__img product__img" src="{{$product->img}}" alt="{{ $product->alt }}">
                </label>
                <div class="slide__price product__price">{{$product->price ? $product->price . ' ₽'  : null}}</div>
             </div>
             <div class="slide__bottom">
               <label class="slide__name" for="product_{{$loop->index}}">{{$product->name}}</label>
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
