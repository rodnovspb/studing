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
$url = $_SERVER['REQUEST_URI'];
preg_match('#/page/([a-z0-9_-]+)#', $url, $match);
$slug = $match[1];


$query = "SELECT * FROM pages WHERE slug='$slug'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$page = mysqli_fetch_assoc($result);

$layout = file_get_contents('layout.php');
$layout = str_replace('{{title}}', $page['title'], $layout);
$layout = str_replace('{{content}}', $page['content'], $layout);
echo $layout;


?>