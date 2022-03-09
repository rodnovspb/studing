<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>


<p>Авторизация</p>
<form action="" method="post">
    <input name="login" placeholder="логин">
    <input name="pass" placeholder="пароль">
    <input name="submit" type="submit">
</form>

<?php
if(!empty($_POST['submit']) and !empty($_POST['login']) and !empty($_POST['pass'])) {
$login = $_POST['login'];
$passAut = $_POST['pass'];

// запрашиваем соленый пароль из базы
    $query = "SELECT * FROM user WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if(!empty($user)) {
//        $salt = $user['salt'];
        $pass = $user['pass'];

//        $hash = md5($passAut . $salt );
        if(password_verify($passAut, $pass)){
          echo 'Вы авторизованы<br>';
          session_start();
          $_SESSION['auth'] = true;
          $_SESSION['login'] = $user['login'];
          $_SESSION['id'] = $user['id'];
          $_SESSION['status'] = $user['status'];
          echo "<a href='delete.php'>удалить страницу</a>";
        }
        else echo "Логин или пароль неверны";
    }
    else {
        echo 'Такого логина нет';
    }


}
?>

<?php
$login = $_POST['login'];
$query = "SELECT *, statuses.name as status FROM user 
	LEFT JOIN statuses
	on user.status=statuses.id WHERE login='$login'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($res);

if(!empty($user)) {
  $hash = $user['pass'];
  if(password_verify($passAut, $hash)){
    echo "<h1>Ваш статус: $user[status]</h1>";


  }
}


?>

