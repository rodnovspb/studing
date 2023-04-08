<?php

define ('DS'          , DIRECTORY_SEPARATOR);
define ('CLASSES'     , PROJECT.DS.'classes'.DS);
define ('CONTROLLERS' , PROJECT.DS.'controllers'.DS);
define ('VIEWS'       , PROJECT.DS.'views'.DS);
define ('PARSER'      , PROJECT.DS.'parser'.DS);
define ('VENDOR'      , PROJECT.DS.'vendor'.DS);
define ('FILES'       , PROJECT.DS.'files'.DS);

spl_autoload_register('loadClass');

function loadClass ($className) { 
    require_once CLASSES.$className.'.php';   
}

$data  = new DataFromBase();
$route = new Router();
$view  = new Views();

$route->route();

if(!$route->ctrlr) {
    $route->setNamedParam('ctrlr', 'main');
}
if($_POST) {
    $post = $route->getPost()->post;
}     

define('CONTROLLER', $route->ctrlr);
define('VIEW', $route->ctrlr);
include CONTROLLERS.$route->ctrlr.'.php';

if($route->ctrlr != 'ajax') {
    $mainLink = '';
    if (!isset($route->ctrlr) OR $route->ctrlr != 'main') {
        switch ($route->ctrlr) {
            case 'running':
                $mainLink = ToHTML::link(['link' => '/parser/index.php?route=crud_settings', 'name' => 'В меню настроек']);
                break;
            default:
                $mainLink = ToHTML::link(['link' => '/parser/', 'name' => 'В меню выбора']);
        }
    }
    include VIEWS.'layout.php';
}