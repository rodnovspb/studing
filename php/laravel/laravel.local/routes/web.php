<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'главная';
});

Route::get('/user/{id}', function () {
    return 'id';
})->whereNumber('id');

Route::get('/user/{slug}', function () {
    return 'slug';
})->where('slug', '[a-z0-9_-]+');





