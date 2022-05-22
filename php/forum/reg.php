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
.error {
    text-align: center;
    color: #f00;
    margin-top: 15px;
}

.success {
    color: #f00;
    font-size: 1.5em;
    text-align: center;
    margin-top: 15px;

}
.suc {
    text-align: center;
    margin-top: 15px;
}
.registr {
    text-align: right;
}


</style>
</head>
<body>

  <?php

  $host = "localhost";
  $user = 'root';
  $pass = '';
  $name = 'mydb';
  $link = mysqli_connect($host, $user, $pass, $name);
  mysqli_query($link, "SET NAMES 'utf8'");
  ?>


<div class='registr'><a href='/'>Войти</a></div>



<div class="reg">
  <h1 class="h1">Регистрация</h1>
  <form action="" method="post" class="form">
	<div class="field"><label for="login">Введите логин</label><input type="text" id="login" name="login"></div>
	<div class="field"><label for="pass">Введите пароль</label><input type="password" id="pass" name="pass"></div>
	<div class="field"><label for="confirm">Повторите пароль</label> <input id="confirm" type="password" name="confirm"></div>
	<div class="submit"><input name="submit" type="submit" value="Зарегистрироваться"></div>
  </form>
</div>

<?php
	if(!empty($_POST['login']) and !empty($_POST['pass']) and !empty($_POST['confirm']) and !empty($_POST['submit'])) {
	  	if(preg_match('/^[a-z0-9_-]+$/', $_POST['login'])!==1){
         echo "<div class='error'>Логин должен содержать только латинские символы или цифры</div>";
        }
	  	elseif (preg_match('/^[a-z0-9_-]+$/', $_POST['pass']) !==1) {
         echo "<div class='error'>Пароль должен содержать только латинские символы или цифры</div>";
        }
		elseif(strlen($_POST['login'])<5 or strlen($_POST['login'])>10) {
		  echo "<div class='error'>Логин должен содержать от 5 до 10 латинских символов</div>";
		}
		elseif (strlen($_POST['pass'])<5 or strlen($_POST['confirm'])>10) {
          echo "<div class='error'>Пароль должен содержать от 5 до 10 символов</div>";
        }
		elseif ($_POST['pass'] !== $_POST['confirm']) {
          echo "<div class='error'>Пароли не совпадают</div>";
        }
	  	else {
	  	  $login = $_POST['login'];
	  	  $query = "SELECT * FROM forum WHERE login = '$login'";
	  	  $res = mysqli_query($link, $query) or die(mysqli_error($link));
	  	  $result = mysqli_fetch_assoc($res);
	  	  if(empty($result)) {
	  	    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	  	    $query = "INSERT INTO forum SET login = '$login', pass = '$pass'";
	  	    mysqli_query($link, $query) or die (mysqli_error($link));
	  	    session_start();
	  	    $_SESSION['login']=$login;
            echo "<div class='success'>Поздравляем, вы зарегистрированы!</div>
					<div class='suc'><a class='success' href='index.html'>Авторизоваться</a></div>";

		  }
	  	  else {
            echo "<div class='error'>Логин занят</div>";
		  }

		}
	}
	elseif(!empty($_POST['submit'])) {
	  echo "<div class='error'>Заполните все поля</div>";
	}







?>














</body>
</html>