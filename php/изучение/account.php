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
if(!empty($_POST['submit']) and !empty($_POST['login']) and !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM user WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if(!empty($user)) {
      if(password_verify($pass, $user['pass'])) {
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user['id'];
        header('Location: edit-acc.php');
	  }
      else echo 'Логин или пароль неправильный';
	}
    else {
      echo 'Такого юзера нет';
	}
}



?>
