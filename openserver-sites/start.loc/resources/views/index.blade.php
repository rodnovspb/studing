@extends('layouts.layout')

@section('content')



    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>



    <a href="/storage/images/9ivNa8yX4cngDIPNanphOyeDnrCuGMXTLhOifRLm.jpg" download>Скачать</a>







@endsection
