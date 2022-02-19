<meta charset="utf-8">

<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
if(!empty($_POST)){
    $query = "INSERT INTO users SET name = '$_POST[name]', age = '$_POST[age]', salary = '$_POST[salary]'" ;
    mysqli_query($link, $query) or die(mysqli_error($link));
    header('Location: page.php');
}


?>

<form action="" method="post">
  <input name="name" placeholder="имя">
  <input name="age" placeholder="возраст">
  <input name="salary" placeholder="зп">
  <input type="submit">
</form>
