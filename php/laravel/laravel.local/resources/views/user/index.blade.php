<x-layout>
    @foreach($users as $user)
        <p>Имя: {{$user->name}}</p>
        <p>Почта: {{$user->email}}</p>
        <p>Возраст: {{$user->age}}</p>
    @endforeach
    {{ $users->links() }}
</x-layout>
