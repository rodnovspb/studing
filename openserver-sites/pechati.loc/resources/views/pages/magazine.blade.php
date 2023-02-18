@extends('layouts.layout')

@section('sticky-inner')
    @include('parts.sticky-inner')
@endsection

@section('content')
    <main class="main main-page">
      <div class="container">
        <section>
            {!! $data->content !!}
            {!! $options['order_methods'] !!}
            <h3>{!! $options['step_1'] ?? null !!}</h3>
            <div style="text-align: center;">Блок с печатями</div>
            <h3>{!! $options['step_2'] ?? null !!}</h3>
            <div style="text-align: center;">Блок с оснастками</div>
            <h3>{!! $options['step_3'] ?? null !!}</h3>
            <div style="text-align: center;">Блок с реквизитами</div>
            <h3>{!! $options['step_4'] ?? null !!}</h3>
            <div style="text-align: center;">Блок доставки</div>
        </section>
      </div>
    </main>
@endsection
