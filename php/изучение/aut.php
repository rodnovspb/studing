<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
$flag = false;
if(!empty($_POST['login']) and !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$pass'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    if(!empty($user)) {
      session_start();
      $_SESSION['flash'] = 'Найден';
      $_SESSION['auth'] = true;
     header('Location: page2.php');
      echo 'Найден';
      $flag = true;
	}
    else {
        echo 'Не найден';

	}
}

?>

<?php if(!$flag) { ?>
  <form action="" method="post">
    <input name="login">
    <input name="pass">
    <input type="submit">
</form>
<?php } ?>








