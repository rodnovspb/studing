<div>
    <table>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->salary }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </table>
</div>
