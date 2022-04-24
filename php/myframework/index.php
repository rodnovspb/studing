<?php
namespace Core;

error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once __DIR__ . "/project/config/connection.php";
spl_autoload_register();

$routes = require __DIR__ . '/project/config/routes.php';


$router = new Router;
$track = $router->getTrack($routes, $_SERVER['REQUEST_URI']);
$page = (new Dispatcher)->getPage($track);



