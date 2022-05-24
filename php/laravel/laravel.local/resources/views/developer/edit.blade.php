<x-layout>
    <form action="/developers" method="post">
        @csrf
        <input type="text" name="name" value="{{$name}}">
        <input type="text" name="surname" value="{{$surname}}">
        <input type="hidden" value="{{$id}}" name="hidden">
        <input type="hidden" value="{{$page}}" name="page">
        <input type="submit">
    </form>
</x-layout>
