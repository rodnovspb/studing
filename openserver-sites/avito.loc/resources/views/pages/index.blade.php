@extends('layouts.layout')

@section('content')

    <button id="btn">Кнопка</button>


@endsection

@push('scripts')

    <script>

        let apiKey = '7c9c02ad-211c-4e76-bbdf-f654e63cec96'

         if(navigator.geolocation){
             navigator.geolocation.getCurrentPosition(
                 function (pos){
                     getAddress(pos.coords.latitude, pos.coords.longitude)
                 },
                 function (error){console.log(error.message)})}

        function getAddress(lat, lon){
            fetch(`https://geocode-maps.yandex.ru/1.x/?format=json&apikey=${apiKey}&geocode=${lon},${lat}`, {
                Referer: 'localhost'
            })
            .then(res=>res.json())
            .then(res=>console.log(res))
            .catch(e=>console.log(e))

        }












    </script>

@endpush


