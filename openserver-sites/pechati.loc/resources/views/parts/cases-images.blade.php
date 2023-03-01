<div class="cases__images">
  <button class="arrow left-arrow" type="button">❮</button>
  <button class="arrow right-arrow" type="button">❯</button>
  @for($i=1; $i<=6; $i++)
    <div class="cases__item">
      <div class="cases__top">
        <label for="cases_radio_{{ $i }}">
          <img class="cases__img" src="https://i.ibb.co/hK3WwWJ/shiny.png" alt="">
        </label>
        <input id="cases_radio_{{ $i }}" type="radio" name="case" value="{{ $i }}">
        <div class="cases__price">300 р</div>
      </div>
      <div class="cases__bottom">
        <div class="cases__name">
          <label for="cases_radio_{{ $i }}" class="cases__title">Shiny-542</label>
          <div class="cases__video">
            <a href="#"><img class="cases__youtube" src="/storage/images/youtube.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  @endfor
</div>
