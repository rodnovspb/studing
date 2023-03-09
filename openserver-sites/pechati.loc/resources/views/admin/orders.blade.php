@extends('layouts.admin-layout')

@section('right')
    <h1>Заказы</h1>
    <p>$flights = Flight::withTrashed()->get();</p>
@endsection











