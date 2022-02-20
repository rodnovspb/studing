<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<form action="" method="post">
    <input name="login" placeholder="логин">
    <input name="pass" type="password" placeholder="пароль">
    <input name="confirm" type="password" placeholder="повторите пароль">
    <input name="date" type="date">
    <input name="mail" type="email" placeholder="почта">
    <input type="submit">
</form>

<?php if(
    !empty($_POST['login']) and
    !empty($_POST['pass']) and
    !empty($_POST['confirm']) and
    !empty($_POST['date']) and
    !empty($_POST['mail'])) {
    $login = $_POST['login'];
  $query = "SELECT * FROM users WHERE login='$login'";
  $user = mysqli_fetch_assoc(mysqli_query($link, $query));
  if(empty($user)) {

  if($_POST['pass']===$_POST['confirm']) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $date = $_POST['date'];
    $mail = $_POST['mail'];
    $dateReg = date('H:i:s Y-m-d');
    $query = "INSERT INTO users SET
 login='$login', 
 password = '$pass',
 date = '$date',
 mail = '$mail',
 datereg = '$dateReg'";
    mysqli_query($link, $query);
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['flag'] = true;
    $_SESSION['login'] = $login;
    $id = mysqli_insert_id($link);
    $_SESSION['id'] = $id;
    header('Location: login.php');
  }
  else {
    echo 'Пароли не совпадают';
  }
  }
  else {
      echo 'такой пользователь уже зарегистрирован';
  }

} ?>
