<x-layout>
    <form action="" method="post">
        @csrf
        <div><input type="range" name="a1"></div>
        <div><input type="image" name="a2"></div>
        <div><input type="file" name="a3"></div>
        <div><input type="checkbox" name="a4"></div>
        <div><input type="hidden" name="a5"></div>
        <div><input type="date" name="a6"></div>
        <div><input type="url" name="a7"></div>
        <div><input type="submit"></div>
    </form>
    @if(isset($arr))
        <ul>
            @foreach($arr as $key=>$value)
                <li>{{$key}} - {{$value}}</li>
            @endforeach
        </ul>
    @endif
    <p>{{$id}}</p>
    <p>{{$login}}</p>
</x-layout>
