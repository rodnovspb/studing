@extends('layouts.lauout')

@section('content')
    @isset($posts)
        @foreach($posts as $post)
            <h1>{{ $post->title }}</h1>
            <div>{{ $post->message }}</div>
            <hr>
        @endforeach
    @else
        <h1>{{ $post->title }}</h1>
        <div>{{ $post->message }}</div>
    @endisset

@endsection
