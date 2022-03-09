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
  <input name="pass" placeholder="пароль" type="password">
  <input name="newpass" placeholder="новый пароль" type="password">
  <input name="confirm" placeholder="подтвердите" type="password">
  <input type="submit" name="submit">
</form>

<?php
if(!empty($_POST['submit'])) {
  $confirm = $_POST['confirm'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $newpass = $_POST['newpass'];

  if($newpass===$confirm) {
  $query = "SELECT * FROM user WHERE login='$login'";
  $res = mysqli_query($link, $query) or die(mysqli_error($link));
  $user = mysqli_fetch_assoc($res);

  if(!empty($user)) {
    $hash = $user['pass'];
    $id = $user['id'];
    if(password_verify($pass, $hash)) {
      $newhash = password_hash($newpass, PASSWORD_DEFAULT);
      $query = "UPDATE user SET pass='$newhash' WHERE id='$id'";
      mysqli_query($link, $query);
      echo 'пароль обновлен';
	}
    else echo 'старый пароль введен неверно';
  }
}
  else echo 'новый пароль введен неверно';

}



?>
