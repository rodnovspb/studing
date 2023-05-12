@extends('layouts.layout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        fetch('{{ route('give') }}', {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'},
            body: JSON.stringify({a: 1, b: 2})})
        .then(res=>res.json())
        .then(res=>console.log(res))
        .catch(e=>console.log(e))
    </script>


@endsection
