@extends('layouts.layout')

@section('content')



    <form action="" method="post">
        @csrf
        <input type="radio" name="radio" value="1">
        <input type="radio" name="radio" value="2">
        <input type="checkbox" name="checkbox">
        <input type="submit">
    </form>














@endsection
