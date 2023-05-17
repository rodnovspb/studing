@extends('layouts.layout')

@section('content')

@foreach($products as $product)
    <div>{{ $product->text }}</div><br><br>
@endforeach

@endsection


