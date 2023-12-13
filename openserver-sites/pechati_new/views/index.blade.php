@extends('layouts.layout')

@section('content')
  <section class="divisions">
    <div class="divisions__cards">
      @foreach($links as $link)
        <a href="{{ urlProcessor::makeUrl($link['dropdown']) }}" style="background-image: url('{{$link['image']}}')"><h2>{{ $titles[$link['dropdown']] }}</h2></a>
      @endforeach
    </div>
  </section>
@endsection

