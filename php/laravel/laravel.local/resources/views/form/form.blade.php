<x-layout>
    <x-slot:title>Заголовок формы</x-slot:title>
    <x-slot:meta>
      <meta http-equiv="Content-Language" content="ru">
    </x-slot:meta>
    <form action="/result" method="get">
        <div><input type="text" name="num1"></div>
        <div><input type="text" name="num2"></div>
        <div><input type="text" name="num3"></div>
        <div><input type="submit" name="submit"></div>
    </form>
</x-layout>
