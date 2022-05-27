<x-layout-2>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <x-slot:meta>
        {{ $meta }}
    </x-slot:meta>
    <div>
        <p>{{ $name }}</p>
        <div>
            @foreach($lessons as $lesson)
                <p>{{$lesson['lesson']}}</p>
            @endforeach
        </div>
    </div>

</x-layout-2>
