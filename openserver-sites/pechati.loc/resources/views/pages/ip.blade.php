@extends('layouts.layout')

@section('sticky-inner')
    @include('parts.sticky-inner')
@endsection

@section('content')
    <main class="main main-page">
      <div class="container">
        <section class="ip">
            <h1>Изготовление печати ИП</h1>
            <div class="order-text">Закажите как удобно: 1) онлайн-заказ ниже 2) письмо на cinedrodnov@mail.ru  3) <span class="order-img"><a href="https://wa.me/79514466332" target="_blank" title="Whatsapp"><img src="{{ asset('storage/images/decoration/whatsapp.jpg') }}" alt="whatsapp"></a><a href="https://viber.click/79514466332" title="Viber" target="_blank"><img src="{{ asset('storage/images/decoration/viber.jpg') }}" alt="viber"></a><a href="https://telegram.me/cinedbs" target="_blank" title="Telegram"><img src="{{ asset('storage/images/decoration/telegram.jpg') }}" alt="telegram"></a></span><span class="order-phone">89514466332</span></div>
            <h3 class="steps">Шаг 1 из 3   Выберите макет</h3>
        </section>
      </div>
    </main>
@endsection
