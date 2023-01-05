@extends('layouts.layout')

@section('content')

    @if(session('success'))
        <div class="alert-success bg-green-200 p-4 text-center w-2/12">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert-error bg-red-200 p-4 text-center w-2/12">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}"><span>@error('name') {{ $message }} @enderror</span><br>
        <input type="text" name="surname" value="{{ old('surname') }}"><span>@error('surname') {{ $message }} @enderror</span><br>
        <input type="submit">
    </form>




@endsection






