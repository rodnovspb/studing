<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>

</head>
<body>

  <p>Этот текст для всех пользователей</p>
  <?php
      session_start();
      if($_SESSION['auth'] !== true): ?>
      <p>Авторизуйтесь <a href="login.php">Авторизация</a></p>
  <? endif; ?>

  <?php
  if($_SESSION['auth'] == true): ?>
  <p>Этот текст только для авт. пользователей, Ваш логин: <?= $_SESSION['login'] ?></p>
  <?php endif; ?>















</body>
</html>