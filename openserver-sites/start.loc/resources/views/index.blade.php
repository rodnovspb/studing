@extends('layouts.layout')

@section('content')



    <form action="" method="post">
        @csrf
        <input type="text" name="name">
        <input type="text" name="surname">
        <input type="submit">
    </form>














@endsection
