@extends('layouts.layout')

@section('content')


{{ fake()->unique()->safeEmail() }}





@endsection






