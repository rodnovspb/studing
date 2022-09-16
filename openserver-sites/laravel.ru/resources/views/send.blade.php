@extends('layouts.layout')

@section('title')
    @parent
    {{ $title }}
@endsection

@section('content')
    <div class="container">

        <form class="mt-5" method="post" action="{{ route('create_mail') }}">
            @csrf
            <div class="form-group">
    <label for="name">Ваше имя</label>
    <input type="text" class="form-control" id="name" placeholder="Ваше имя" name="name">
  </div>
  <div class="form-group">
    <label for="email">Почта</label>
    <input type="email" class="form-control" id="email" placeholder="Ваше имя" name="email">
  </div>
  <div class="form-group">
    <label for="text">Текст сообщения</label>
    <textarea class="form-control" id="text" rows="5" name="text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Отправить</button>
</form>
    </div>
@endsection
