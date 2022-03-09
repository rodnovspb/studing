<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>



<form action="" method="post">
    <input name='pass' type="password" placeholder="пароль">
    <input type="submit" value="удалить страницу" name="submit">
</form>

<?php
session_start();
$id=$_SESSION['id'];
if(!empty($_POST['submit'])) {
    $query = "SELECT * FROM user WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if(password_verify($_POST['pass'], $user['pass'])) {
        $query = "DELETE FROM user WHERE id='$id'";
        mysqli_query($link, $query);
        echo 'пользователь удален';
    }
    else echo 'неверный пароль';
}

?>