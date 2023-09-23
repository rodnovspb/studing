@extends('layouts.layout')

@section('content')
    {!! $documentObject['content'] !!}
    <a href="@makeUrl($documentObject['id']))"></a>

@endsection
