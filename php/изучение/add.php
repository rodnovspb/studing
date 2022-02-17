<?php


$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>


<form action="" method="post">
    <input name="name" placeholder="имя" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>">
    <input name="salary" placeholder="зп" value="<?php if(isset($_POST['salary'])) echo $_POST['salary']?>">
    <input name="age" placeholder="возраст" value="<?php if(isset($_POST['age'])) echo $_POST['age']?>">
    <input type="submit">
</form>

<?php
if(!empty($_POST)){
    $name = $_POST['name'];
    $salary = (int)($_POST['salary']);
    $age = (int)($_POST['age']);
}

$query = "INSERT INTO users SET name='$name', age = '$age', salary = '$salary'";
mysqli_query($link, $query) or die(mysqli_error($link));

?>