@extends('layouts.layout')

@section('content')
    @php
    $arr = [];
    @endphp

    @forelse($arr as $item)
        <div>{{ $item }}</div>
    @empty
        По запросу товаров не найдено.
    @endforelse




@endsection
