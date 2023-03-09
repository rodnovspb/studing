<div class="templates__images">
  <button class="arrow left-arrow" type="button">❮</button>
  <button class="arrow right-arrow" type="button">❯</button>
  <?php $i=1 ?>
  @foreach($templateProducts as $product)
{{--    можеть быть data-des="1" делать ++--}}
    <div class="templates__item dn" @foreach($product->subtypes as $subtype) @if($subtype->id == 2) data-des="1" @elseif($subtype->id == 3) data-logo="1" @endif @endforeach>
       <div class="templates__number">{{ $i }}</div>
       <label for="templates_radio_{{ $product->id }}">
         <img class="templates__img" src="{{ $product->src }}" alt=""
              style="border-radius: 50%">
       </label>
       <input id="templates_radio_{{ $product->id }}" type="radio" name="template" value="{{ $product->id }}">
       <div class="templates__price">{{ $product->price }} р</div>
    </div>
    <?php $i++ ?>
  @endforeach
</div>
