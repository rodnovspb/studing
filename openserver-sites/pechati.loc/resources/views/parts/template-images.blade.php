<div class="templates__images">
  <button class="arrow left-arrow" type="button">❮</button>
  <button class="arrow right-arrow" type="button">❯</button>
  @for($i=1; $i<=6; $i++)
    <div class="templates__item">
       <div class="templates__number">{{ $i }}</div>
       <label for="templates_radio_{{ $i }}">
         <img class="templates__img" src="https://via.placeholder.com/300x300/33CCFF/FFF/" alt=""
              style="border-radius: 50%">
       </label>
       <input id="templates_radio_{{ $i }}" type="radio" name="template" value="{{ $i }}">
       <div class="templates__price">300 р</div>
    </div>
  @endfor
</div>
