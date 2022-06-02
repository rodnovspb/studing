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
if(!empty($_POST['letter'])) {
    $str = $_POST['letter'];
    $query = "SELECT name from geo_city WHERE name LIKE '$str%'";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}
