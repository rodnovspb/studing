<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);

function show($arr, $die=false){
    echo "<pre><p style='background-color: beige;
color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid; font-size: 20px;'>";
    if(is_bool($arr)){
        if($arr == 'bool(true)') {
            print_r('true');
        }  elseif ($arr == 'bool(false)'){
            print_r('false');
        }  else {
            var_dump($arr);
        }
    } elseif($arr === '') {
        print_r('пустая строка ""');
    } elseif($arr === null) {
        print_r('null');
    } else {
        print_r($arr);
    }
    echo "</p></pre>";
    if($die) {
        die;
    }
}
