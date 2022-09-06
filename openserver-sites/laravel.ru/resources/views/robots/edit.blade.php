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


    <h2>Срабатывает функция edit на редактирование робота {{ $id }}</h2>
  <form action="{{ route('robots.update', ['robot' => $id]) }}" method="post">
      @csrf
      @method('put')
      <input type="text" name="robot" value="<?= $id ?>">
      <input type="submit" value="Создать">
  </form>













</body>
</html>
