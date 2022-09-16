@extends('layouts.layout')

@section('title')
    @parent:: Registration
@endsection

@section('content')
<div class="container">

    <form class="mt-5" method="post" action="{{ route('store.user') }}">
    @csrf
         <div class="form-group">
             <label for="name">Ваше имя</label>
             <input type="text" class="form-control" id="name" placeholder="Ваше имя" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
              <label for="email">Почта</label>
              <input type="email" class="form-control" id="email" placeholder="Ваша почта" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" class="form-control" id="password" placeholder="Ваш пароль" name="password">
        </div>
        <div class="form-group">
              <label for="password_confirmation">Пароль</label>
              <input type="password" class="form-control" id="password_confirmation" placeholder="Повторите пароль" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
    </form>

</div>
@endsection
