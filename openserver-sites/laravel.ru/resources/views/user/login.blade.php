@extends('layouts.layout')

@section('title')
    @parent:: Вход
@endsection

@section('content')
    <div class="container">

    <form class="mt-5" method="post" action="{{ route('login') }}">
    @csrf
        <div class="form-group">
              <label for="email">Почта</label>
              <input type="email" class="form-control" id="email" placeholder="Ваша почта" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" class="form-control" id="password" placeholder="Ваш пароль" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Войти</button>
    </form>

</div>
@endsection
