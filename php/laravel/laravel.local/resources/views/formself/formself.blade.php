<x-layout>
    <form action="" method="post">
        @csrf
        <div><label>Город: <input type="text" name="city"></label></div>
        <div><label>Страна: <input type="text" name="country"></label></div>
        <div><input type="submit"></div>
    </form>
    @if(isset($arr))
        <ul>
            @foreach($arr as $key=>$value)
                <li>{{$value}}</li>
            @endforeach
        </ul>
    @endif

</x-layout>
