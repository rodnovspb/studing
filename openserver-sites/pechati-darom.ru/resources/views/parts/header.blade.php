<header class="header">
      <div class="container container-header">
        <div class="header__links">
          @foreach($articleMenu as $item)
            <a href="{{ env('ABS_URL') . $item->uri }}" title="{{ $item->link_title }}">{{ $item->top_header }}</a>
          @endforeach
        </div>
      </div>
    </header>


