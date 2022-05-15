<x-layout>
    @foreach($countries as $country)
        <h1>{{$country['country']}}</h1>
            <ul>
            @foreach($country['cities'] as $item)
                <li>{{$item['city']}}</li>
            @endforeach
            </ul>
    @endforeach
</x-layout>
