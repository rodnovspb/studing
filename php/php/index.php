<meta charset="utf-8">

<?php

$url = $_SERVER['REQUEST_URI'];
$layout = file_get_contents('layout.php');
$content = file_get_contents('view' . $url . '.php');
$content = preg_replace('/{{ title: "(.+?)" }}/', '', $content);



$layout = str_replace('{{content}}', $content, $layout);



preg_match('/{{ title: "(.+?)" }}/', $content, $match);
$title = $match[1];
$layout = str_replace('{{title}}', $title, $layout);

echo $layout;














?>
















