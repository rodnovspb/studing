@extends('layouts.layout')

@section('content')
    {{ Breadcrumbs::render('blog') }}

    {!! Form::select('size', ['L' => 'Large', 'S' => 'Small']) !!}

    {!! Form::close() !!}
@endsection
