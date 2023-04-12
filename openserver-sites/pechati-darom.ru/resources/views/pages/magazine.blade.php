@extends('layouts.layout')

@section('sticky-inner')
  @include('parts.sticky-inner')
@endsection

@section('content')
  <main class="main main-page">
    <div class="container">
      {!! $data->content !!}
      {!! $options['order_methods'] !!}

      {{--на случай, если пользователь создаст свою страницу магазина--}}
      @if(view()->exists("forms.{$data->uri}"))
        @include("forms.{$data->uri}")
      @else
        @include("forms.other")
      @endif

    </div>
  </main>
@endsection

