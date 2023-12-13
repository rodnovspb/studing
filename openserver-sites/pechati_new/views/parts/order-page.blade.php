<section class="order">

    <div class="order__content">{!! $documentObject['content'] !!}</div>

    <div class="order__methods">{!! $modx->runSnippet('order_methods') !!}</div>

    <form action="{{ route('order') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="page" value="{{ $documentObject['pagetitle'] }}">

      @include('parts.templates')

      @include('parts.cases')

      @include('parts.requisites')

      @include('parts.products')

    </form>
</section>
