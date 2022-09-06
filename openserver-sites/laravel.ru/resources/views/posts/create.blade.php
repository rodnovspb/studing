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


  <form action="{{ route('posts.store') }}" method="post">
      @csrf
      <input type="text" name="title">
      <input type="submit">
  </form>














</body>
</html>
