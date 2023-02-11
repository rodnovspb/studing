<div class="sticky-inner">
    @foreach($topMenu as $item)
        <a href="{{ env('ABS_URL') . $item->uri }}" title="{{ $item->link_title }}">{{ $item->top_header }}</a>
    @endforeach
</div>

