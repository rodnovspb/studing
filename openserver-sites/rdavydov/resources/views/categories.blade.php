@extends('layouts.master')

@section('title', 'Все категории')

@section('content')
    @foreach($categories as $category)
        <div class="panel">
        <a href="{{ route('category', $category->code) }}">
          <img src="{{ Storage::url($category->image) }}"  height="150px">
          <h2>{{ $category->__('name')  }}</h2>
        </a>
        <p>
          {{ $category->__('description') }}
        </p>
      </div>
    @endforeach
@endsection



