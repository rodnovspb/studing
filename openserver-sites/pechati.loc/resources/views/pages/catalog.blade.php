@extends('layouts.layout')

@section('sticky-inner')
    @include('parts.sticky-inner')
@endsection

@section('content')
    <main class="main main-page">
      <div class="container">
        <section class="ip">
            <h1>Каталог</h1>
            @dd($data)
        </section>
      </div>
    </main>
@endsection
