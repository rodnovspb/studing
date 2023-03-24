@extends('layouts.layout')

@section('content')
    <main class="main main-index">
      <div class="container">
        <section class="display">
        @foreach($mainMenu as $item)
          <a class="display__item" href="{{ secure_asset($item->uri) }}" title="{{ $item->link_title }}" style="background-image: url('{{ secure_asset($item->image_main_menu) }}')">
            <h1 class="display__title">{{ $item->main_header }}</h1>
          </a>
        @endforeach

        </section>
      </div>
    </main>
@endsection


