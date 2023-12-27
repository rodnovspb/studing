<section class="order">

    <div class="order__content">{!! $documentObject['content'] !!}</div>

    <form name="order" action="{{ route('order') }}" method="post" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="page" value="{{ $documentObject['pagetitle'] }}">

      @include('parts.templates')

      @include('parts.cases')

      @include('parts.requisites')

      @include('parts.products')

    </form>
</section>

@push('header')
  <script src="https://www.google.com/recaptcha/api.js?render=6LdPET0pAAAAAFA8NdG5hLAnfiulnMWRsb690ixs"></script>
@endpush
