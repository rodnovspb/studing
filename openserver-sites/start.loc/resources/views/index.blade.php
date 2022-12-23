@extends('layouts.layout')

@section('content')



   <p>Lorem ipsum dolor sit amet. {{ $key }}</p>

    @foreach($qqq as $item)
        <div>{{ $item->name }}</div>
    @endforeach





@endsection
