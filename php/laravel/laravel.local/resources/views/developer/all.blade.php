<x-layout>
    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
        </tr>
        @foreach($all as $developer)
            <tr>
            <td>{{$developer->name}}</td>
            <td>{{$developer->surname}}</td>
            <td><a href="/edit/{{$developer->id}}">редактировать</a></td>
            <td><a href="?del={{$developer->id}}">удалить</a></td>
        @endforeach
            </tr>
    </table>
    {{$all->links()}}

</x-layout>
