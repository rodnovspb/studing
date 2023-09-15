@if ($paginator->hasPages())
    <div>
  <ul class="pagination">
    @if ($paginator->onFirstPage())
          <li>
      <span class="button small disabled">Предыдущая</span>
    </li>
      @else
          <li>
      <a class="button small" href="{{ $paginator->previousPageUrl() }}" rel="prev">Предыдущая</a>
    </li>
      @endif

      @foreach ($elements as $element)
          @if (is_string($element))
              <li><span>...</span></li>
          @endif
          @if (is_array($element))
              @foreach ($element as $page => $url)
                  @if($page == $paginator->currentPage())
                      <li><a class="page active" href="{{ $url }}">{{ $page }}</a></li>
                  @else
                      <li><a class="page" href="{{ $url }}">{{ $page }}</a></li>
                  @endif
              @endforeach
          @endif
      @endforeach

      @if ($paginator->hasMorePages())
          <li>
        <a class="button small" href="{{ $paginator->nextPageUrl() }}" rel="next">Следующая</a>
    </li>
      @else
          <li>
        <span class="small button disabled">Следующая</span>
    </li>
      @endif
  </ul>
</div>
@endif
