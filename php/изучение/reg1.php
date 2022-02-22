<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<form action="" method="post">
    <input name="login">
    <input name="pass">
    <input name="submit" type="submit">
</form>

<?php
if(!empty($_POST['submit']) and !empty($_POST['login']) and !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = password_hash($login, PASSWORD_DEFAULT);
    $query = "INSERT INTO user SET login='$login', pass='$pass', salt = '$salt'";
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
