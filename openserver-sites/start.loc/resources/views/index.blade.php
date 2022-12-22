@extends('layouts.layout')

@section('content')



    @if(session('success'))
        <div>{{ session('success') }}</div>
    @else
        <div>Ошибка</div>
    @endif














@endsection
