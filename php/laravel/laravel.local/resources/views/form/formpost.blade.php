<x-layout>
    <form action="/resultpost" method="post">
        @csrf
        <div><label>Ваше имя <input type="text" name="name"></label></div>
        <div><label>Ваш возраст <input type="text" name="age"></label></div>
        <div><label>Ваша зарплата <input type="text" name="salary"></label></div>
        <div><input type="submit"></div>
    </form>

</x-layout>
