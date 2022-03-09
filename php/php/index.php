<meta charset="utf-8">

<?php

$url = $_SERVER['REQUEST_URI'];
$layout = file_get_contents('layout.php');
$content = file_get_contents('view' . $url . '.php');
$layout = str_replace('{{content}}', $content, $layout);

$titles = require_once 'view/titles.php';
$title = $titles[$url];

$layout = str_replace('{{title}}', $title, $layout);

echo $layout;










?>
















