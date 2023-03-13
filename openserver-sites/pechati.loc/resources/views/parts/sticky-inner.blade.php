<div class="sticky-inner">
  <div class="container container-sticky-inner">
    <div class="sticky-inner-block">
      @foreach($topMenu as $item)
        <a href="{{ env('ABS_URL') . $item->uri }}" title="{{ $item->link_title }}">{{ $item->top_header }}</a>
      @endforeach
    </div>
  </div>
</div>

