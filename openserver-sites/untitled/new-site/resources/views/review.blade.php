@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
    <h1 style="text-align: center;">Форма добавления отзыва</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/review/check" method="post">
        @csrf
        <input class="form-control" type="email" name="email" id="email" placeholder="Введите почту">
        <input class="form-control" type="text" name="subject" id="subject" placeholder="Введите отзыв">
        <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br><br>
    <h1>Все отзывы</h1>
    @foreach($reviews as $el)
        <div class="alert alert-warning">
            <h3> {{ $el->subject }} </h3>
            <b> {{  $el->email }} </b>
            <p>  {{ $el->message }} </p>
        </div>
    @endforeach
@endsection










