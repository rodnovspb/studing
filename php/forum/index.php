<?php session_start();
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
	.h1 {
        text-align: center;
    }
    .reg{
        width: 35%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }
    .form div:not(:last-child) {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .submit {
        text-align: right;
    }
	.registr {
        text-align: right;
	}
    .error {
        text-align: center;
        color: #f00;
        margin-top: 15px;
    }

</style>
</head>
<body>

<div class="registr"><a href="reg.php">Зарегистрироваться</a></div>

<div class="reg">
  <h1 class="h1">Введите логин и пароль</h1>
  <form action="" method="post" class="form">
	<div class="field"><label for="login">Введите логин</label><input type="text" id="login" name="login" value="<?php if($_SESSION['login']) echo $_SESSION['login']?>"></div>
	<div class="field"><label for="pass">Введите пароль</label><input type="password" id="pass" name="pass"></div>
	<div class="submit"><input name="submit" type="submit" value="Войти"></div>
  </form>
  <a href="main.php">Посмотреть темы форума</a>
</div>

<?php

if(!empty($_POST['login']) and !empty($_POST['pass'])) {
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $query = "SELECT * FROM forum WHERE login = '$login'";
  $res = mysqli_query($link, $query) or die(mysqli_error($link));
  $user = mysqli_fetch_assoc($res);
  if(!empty($user)) {
    if(password_verify($pass, $user['pass'])) {
     $_SESSION['login'] = $login;
     $_SESSION['status'] = $user['status'];
     header("Location: main.php");
	}
    else {
        echo "<div class='error'>Логин или пароль неверные</div>";
    }
  }
  else {
      echo "<div class='error'>Такого пользователя нет</div>";
  }
}
?>













</body>
</html>
