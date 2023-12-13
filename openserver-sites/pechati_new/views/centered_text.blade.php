@extends('layouts.layout')

@section('content')
  <section class="centered">
    <div>
      {!! $documentObject['content'] !!}
    </div>
  </section>
@endsection
