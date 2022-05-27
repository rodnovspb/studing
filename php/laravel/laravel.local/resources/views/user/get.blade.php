<x-layout-2>
    <ul>
    @foreach($users as $user)
    <li>{{$user}}</li>
    @endforeach
    </ul>
</x-layout-2>
