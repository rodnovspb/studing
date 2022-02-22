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

// запрашиваем соль из базы
    $query = "SELECT * FROM user WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if(!empty($user)) {
        $salt = $user['salt'];
        $pass = $user['pass'];
        $hash = md5($passAut . $salt );
        if($hash == $pass) echo 'Вы авторизованы';
        else echo "Логин или пароль неверны";
    }
    else {
        echo 'Такого логина нет';
    }


}


?>

