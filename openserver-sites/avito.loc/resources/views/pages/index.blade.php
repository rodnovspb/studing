@extends('layouts.layout')

@section('content')

    <button id="btn">Кнопка</button>


@endsection

@push('scripts')

    <script>


        function func(){
            window.a = 5
        }

        func()

        console.log(window.a)


        // if(navigator.geolocation){
        //     navigator.geolocation.getCurrentPosition(
        //         function (pos){console.log(pos)},
        //         function (error){console.log(error.message)})}






    </script>

@endpush


