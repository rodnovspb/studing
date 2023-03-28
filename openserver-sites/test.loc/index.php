<?php

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);

require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use function Symfony\Component\String\s;

mb_internal_encoding('UTF-8');
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'parsing';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");




$data = file_get_contents('http://targ.loc/1.jpg');

file_put_contents('img.jpg', $data);




























