<x-layout>
    <ul>
    @foreach($users as $user)
    <li>{{$user}}</li>
    @endforeach
    </ul>
</x-layout>
