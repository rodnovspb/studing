<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
if(isset($_GET['num'])){
    $num = $_GET['num'];
    $query = "DELETE FROM employees WHERE id=$num";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    //функция mysqli_affected_rows возвращает количество затронутых строк
    $num_rows = mysqli_affected_rows($link);
    echo (json_encode($num_rows));


}



?>
