@extends('layouts.layout')

@section('title')
    @parent
    {{ $title }}
@endsection

@section('content')

<div class="container">
  @include('layouts.errors')
  <form class="mt-5 mb-5" method="post" action="{{ route('home') }}">
    @csrf
    <div class="form-group">
    <label for="title">Название поста</label>
    <input name="title" type="text" value="{{ old('title') }}" class="form-control" id="title" placeholder="Введите название">
  </div>
    <div class="form-group">
    <label for="content">Текст</label>
    <textarea placeholder="Введите текст" class="form-control" id="content" rows="5" name="content">{{ old('content') }}</textarea>
  </div>
    <div class="form-group">
    <label for="rubric_id">Рубрика</label>
    <select class="form-control mb-3" id="rubric_id" name="rubric_id">
        <option>Выберите рубрику</option>
        @foreach($rubrics as $k=>$v)
            <option value="{{ $k }}" @if(old('rubric_id') == $k) selected @endif>{{ $v }}</option>
        @endforeach
    </select>
    </div>
      <button type="submit" class="btn btn-primary">Создать</button>
  </form>
</div>

@endsection

