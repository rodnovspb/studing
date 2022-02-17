<?php
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($res);
    $name = $user['name'];
    $age = $user['age'];
    $salary = $user['salary'];
}


?>


<form action="save.php?id=<?php if(isset($id)) echo $id ?>" method="post">
    <input name="name" placeholder="имя" value="<?php if(isset($name)) echo $name?>">
    <input name="age" placeholder="возраст" value="<?php if(isset($age)) echo $age?>">
    <input name="salary" placeholder="зп" value="<?php if(isset($salary)) echo $salary?>">
    <input type="submit" value="Отправить">
</form>


