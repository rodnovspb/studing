<x-layout>
    <form action="" method="post">
        @csrf
        <div><label>Город: <input type="text" name="city"></label></div>
        <div><label>Страна: <input type="text" name="country"></label></div>
        <div><label>except: <input type="text" name="except"></label></div>
        <div><input type="submit"></div>
    </form>
    @if(isset($arr))
        <ul>
            @foreach($arr as $key=>$value)
                <li>{{$key}} {{$value}}</li>
            @endforeach
        </ul>
    @endif

</x-layout>
