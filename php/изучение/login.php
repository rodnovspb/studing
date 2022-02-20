<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
session_start();
?>

<?php if(!empty($_POST['login']) and !empty($_POST['pass'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    if(!empty($user)) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        echo 'Вы авторизованы';
        echo "<a href='logout.php'>Выйти</a>";
    }
    else {
        echo 'Неверный логин или пароль';
    }

}

if($_SESSION['flag']==true) {
    echo "Вы авторизованы, Ваш id = $_SESSION[id]";
    echo "<a href='logout.php'>Выйти</a>";
}


?>

<?php if($_SESSION['auth'] != true ): ?>
<p>Вы не авторизованы, авторизуйтесь: </p>
<form action="" method="post">
    <input name="login">
    <input name="pass">
    <input type="submit">
</form>

<?php endif; ?>
