@extends('layouts.layout')

@section('content')


    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>






@endsection






