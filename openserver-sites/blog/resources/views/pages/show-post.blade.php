@extends('layouts.main')

@section('title', $post->title)

@section('content')
@include('includes.categories')
    <div>
        <a href="{{ route('getPostsByCat', $slug_cat)  }}" class="btn btn-outline-primary mb-4">Назад</a>
    </div>

    <article>
        {!! $post->text !!}
    </article>


@endsection

