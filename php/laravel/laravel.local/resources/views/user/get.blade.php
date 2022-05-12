<x-layout>
    <table>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
            <th>Зарплата</th>
        </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->salary}}</td>
        </tr>
        @endforeach
    </table>
</x-layout>
