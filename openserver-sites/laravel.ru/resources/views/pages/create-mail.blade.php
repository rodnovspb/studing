@extends('layouts.layout')

@section('title')
    @parent
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        {!! session('success_send') !!}
        <div class="alert alert-success mt-5">
            <form action="/send" method="post">
                @csrf
                <input type="text" name="text">
                <input type="submit">
            </form>
        </div>
    </div>
@endsection
