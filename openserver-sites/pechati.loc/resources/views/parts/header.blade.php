<header class="header">
      <div class="container">
        <div class="header__delivery delivery">
          <div class="delivery__cities">
            <select name="" id="">
              <option value="">Доставить в</option>
              <option value="">Челябинск</option>
              <option value="">Москва</option>
              <option value="">Санкт-Петербург</option>
              <option value="">Южно-Сахалинск</option>
            </select>
          </div>
          <div class="delivery__services">
            <div class="delivery__service service-1">
              <div class="service-1__logo">Яндекс</div>
              <div class="service-1__description">Отправим сразу</div>
            </div>
            <div class="delivery__service service-2">
              <div class="service-1__logo">Курьером</div>
              <div class="service-1__description">Отправим завтра</div>
            </div>
            <div class="delivery__service service-3">
              <div class="service-1__logo">СДЭК</div>
              <div class="service-1__description">1 день - 200 р.</div>
            </div>
          </div>
        </div>
        <div class="header__links">
          @foreach($articleMenu as $item)
            <a href="{{ env('ABS_URL') . $item->uri }}" title="{{ $item->link_title }}">{{ $item->top_header }}</a>
          @endforeach
        </div>
      </div>
    </header>


