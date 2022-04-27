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
if(isset($_GET['mark'])){
    $id = $_GET['mark'];
    $query = "UPDATE employees SET deleted = 1 WHERE id = $id";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $isDel = mysqli_affected_rows($link) > 0;
    exit(json_encode($isDel));
}

elseif (isset($_GET['recover'])) {
    $id = $_GET['recover'];
    $query = "UPDATE employees SET deleted = 0 WHERE id = $id";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $isRecover = mysqli_affected_rows($link) > 0;
    exit(json_encode($isRecover));
}

elseif (isset($_GET['delete'])) {
    $query = "DELETE FROM employees WHERE deleted=1";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $isRemove = mysqli_affected_rows($link) > 0;
    exit(json_encode($isRemove));
}
else {
    $query = "SELECT id, surname, deleted FROM employees";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    for($data=[]; $row = mysqli_fetch_assoc($res); $data[] = $row);
    exit(json_encode($data));
}
?>
