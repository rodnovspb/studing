@extends('layouts.layout')

@section('content')

    @foreach($users as $user)
        <div>{{ $user->name }}</div>
    @endforeach


    <div class="flex justify-center">{{ $users->onEachSide(1)->links() }}</div>

@endsection







