@extends('layouts.layout')

@section('content')



    @foreach($products as $product)
        <div>{{ $product->name }}</div>
    @endforeach




@endsection
