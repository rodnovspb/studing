@extends('layouts.layout')

@section('content')
    {{ Breadcrumbs::render('blog') }}

    <div>@include('flash::message')</div>
@endsection
