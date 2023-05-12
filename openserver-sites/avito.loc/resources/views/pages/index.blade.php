@extends('layouts.layout')

@section('content')
    <script>
        fetch('{{ route('give') }}')

        .then(res=>res.json())
        .then(res=>console.log(res))
        .catch(e=>console.log(e))
    </script>


@endsection
