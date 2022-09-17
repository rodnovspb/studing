@extends('layouts.layout')

@section('title')
    @parent
    {{ $title }}
@endsection
@section('content')
    <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1>{{ $title }}</h1>
      </div>
    </div>
  </section>
    <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          @foreach($posts as $post)
              <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <h5 class="card_title">{{ $post->title }}</h5>
              <p class="card-text">{{ $post->content }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">
{{--                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y') }}--}}
{{--                        {{ $post->getPostDate(); }}--}}
                    {{ $post->created_at->format('d.m.Y') }}
                </small>
              </div>
            </div>
          </div>
        </div>
          @endforeach

          <div class="col-md-12">
              {{ $posts->onEachSide(2)->links() }}
          </div>

      </div>
    </div>
  </div>
@endsection

@section('header')
    @parent
    <div style="text-align: center">Акция! Три рака по цене 4!</div>
@endsection




