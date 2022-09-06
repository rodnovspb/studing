<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Документ</title>
<style>


</style>
</head>
<body>

  <h1>Список постов</h1>

    <ul>
        <li><a href="{{ route('posts.show', ['slug' => 1]) }}">0000000001</a><a href="{{ route('posts.edit', ['slug' => 1]) }}">редактировать</a><form action="{{ route('posts.destroy', ['slug'=> 1]) }}" method="post">@csrf @method('delete') <input type="submit" value="удалить"></form></li>
        <li><a href="{{ route('posts.show', ['slug' => 2]) }}">0000000002</a><a href="{{ route('posts.edit', ['slug' => 2]) }}">редактировать</a><form action="{{ route('posts.destroy', ['slug'=> 2]) }}" method="post">@csrf @method('delete') <input type="submit" value="удалить"></form></li>
        <li><a href="{{ route('posts.show', ['slug' => 3]) }}">0000000003</a><a href="{{ route('posts.edit', ['slug' => 3]) }}">редактировать</a><form action="{{ route('posts.destroy', ['slug'=> 3]) }}" method="post">@csrf @method('delete') <input type="submit" value="удалить"></form></li>
        <li><a href="{{ route('posts.show', ['slug' => 4]) }}">0000000004</a><a href="{{ route('posts.edit', ['slug' => 4]) }}">редактировать</a><form action="{{ route('posts.destroy', ['slug'=> 4]) }}" method="post">@csrf @method('delete') <input type="submit" value="удалить"></form></li>
        <li><a href="{{ route('posts.show', ['slug' => 5]) }}">0000000005</a><a href="{{ route('posts.edit', ['slug' => 5]) }}">редактировать</a><form action="{{ route('posts.destroy', ['slug'=> 5]) }}" method="post">@csrf @method('delete') <input type="submit" value="удалить"></form></li>
    </ul>














</body>
</html>
