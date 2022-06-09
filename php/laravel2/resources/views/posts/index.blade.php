@extends('layout.app')
@section('title', 'Статьи')

@section('content')
    @include('partials.header')
    <div>
        @foreach($posts as $post)
            @include('posts.partials.item', ['post'=>$post])
        @endforeach
        {{ $posts->links() }}
        </div>
@endsection
