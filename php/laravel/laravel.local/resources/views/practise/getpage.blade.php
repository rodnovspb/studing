<x-layout xmlns:x-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <ul>
    @foreach($links as $link)
        <li><a href="https://{{$link['href']}}">{{$link['text']}}</a></li>
    @endforeach
    </ul>

    <table>
        <tr>
        <th>Имя</th>
		<th>Фамилия</th>
		<th>Зарплата</th>
        </tr>
        @foreach($employees as $elem)
            @if($elem['salary'] > 2000)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$elem['name']}}</td>
                <td>{{$elem['surname']}}</td>
                <td>{{$elem['salary']}}</td>
            </tr>
            @endif
        @endforeach
    </table>

    <table>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Бан</th>
        </tr>
        @foreach($users as $user)
            <tr class="{{$user['banned'] ? 'red': 'green'}}">
                <td>{{$user['name']}}</td>
                <td>{{$user['surname']}}</td>
                <td>{{$user['banned'] ? 'Забанен' : "Активен"}}</td>
            </tr>
        @endforeach
    </table>

    @foreach($str as $item)
        <input type="text" value="{{$item}}">
    @endforeach

    <select>
        @foreach($str as $item)
            <option>{{$item}}</option>
        @endforeach
    </select>

    <ul>
    @foreach($days as $day)
       <li {{$day == $currentDay ? "class=red" : null}}>{{$day}}</li>
    @endforeach
    </ul>
</x-layout>
