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


    <h2>Срабатывает функция create на создание робота</h2>
  <form action="{{ route('robots.store') }}" method="post">
      @csrf
      <input type="text" name="robot">
      <input type="submit" value="Создать">
  </form>













</body>
</html>
