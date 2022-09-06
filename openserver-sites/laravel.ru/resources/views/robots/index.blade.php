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

<h1>Функция index показывает список всех роботов</h1>

  <ul>
      <li><a href="{{ route('robots.show', ['robot' => 1]) }}">00001</a>   <a href="{{ route('robots.edit', ['robot'=> 1]) }}">редактировать</a><form action="{{ route('robots.destroy', ['robot' => 1]) }}" method="post">@csrf @method('delete') <button type="submit">удалить</button></form></li>
      <li><a href="{{ route('robots.show', ['robot' => 2]) }}">00002</a>   <a href="{{ route('robots.edit', ['robot'=> 2]) }}">редактировать</a><form action="{{ route('robots.destroy', ['robot' => 2]) }}" method="post">@csrf @method('delete') <button type="submit">удалить</button></form></li>
      <li><a href="{{ route('robots.show', ['robot' => 3]) }}">00003</a>   <a href="{{ route('robots.edit', ['robot'=> 3]) }}">редактировать</a><form action="{{ route('robots.destroy', ['robot' => 3]) }}" method="post">@csrf @method('delete') <button type="submit">удалить</button></form></li>
  </ul>












</body>
</html>
