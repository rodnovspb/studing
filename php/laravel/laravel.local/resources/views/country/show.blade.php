<x-layout>
    @foreach($countries as $country)
        <p>{{$country['city']}}</p>

    @endforeach
</x-layout>
