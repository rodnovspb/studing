@extends('layouts.layout')

@section('title')
    @parent
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-success mt-5">
            <h2>Письмо отправлено</h2>
        </div>
    </div>
@endsection
