@extends('layouts.layout')

@section('content')



    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>














@endsection
