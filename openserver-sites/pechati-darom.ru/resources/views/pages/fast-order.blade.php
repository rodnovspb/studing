@extends('layouts.layout')

@section('sticky-inner')
    @include('parts.sticky-inner')
@endsection

@section('content')
    <main class="main main-page">
      <div class="container">
        <section class="ip">
            {!! $data->content !!}
            @include("forms.{$data->uri}")
        </section>
      </div>
    </main>
@endsection
