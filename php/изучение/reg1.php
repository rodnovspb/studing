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
    <input name="pass" placeholder="пароль">
  	<input name="name" placeholder="имя">
  	<input name="surname" placeholder="фамилия">
  	<input name="patronymic" placeholder="отчество">
  	<input name="date" type="date">
  <label for="status">Админ</label>
  	<input name="status" type="checkbox" id="status">
    <input name="submit" type="submit">
</form>

<?php
if(!empty($_POST['submit']) and !empty($_POST['login']) and !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = password_hash($login, PASSWORD_DEFAULT);
    $name = $_POST['name'];
    if(isset($_POST['status'])) $status = '2';
    else $status = '1';
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $date = $_POST['date'];
    $query = "INSERT INTO user SET 
login='$login', 
pass='$pass',
name = '$name',
surname = '$surname',
patronymic = '$patronymic',
date = '$date',
status = '$status'";
    mysqli_query($link, $query);
}


?>


<?php

function generateSalt () {
    $salt = '';
    $length = 5;
    for($i=0; $i<$length; $i++){
        $salt.=chr(mt_rand(33,126));
    }
    return $salt;
}



?>
