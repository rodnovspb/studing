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

Route::get('/user/{id}/{name}', function ($id, $name) {
    return "ID: $id, name: $name";
})->where('name', '[a-z]{2,}')->where('id', '\d+');

Route::get('/posts/{date}', function ($date){
    return "Дата: $date";
})->where('date', '\d{4}-\d{2}-\d{2}');

Route::get('/date/{year}/{month}/{day}', function ($year, $month, $day){
    return "Дата: $year-$month-$day";
})->where('year', '\d{2,4}')->where('month', '\d{1,2}')->where('day', '\d{1,2}');

Route::get('/{order}', function ($order){
    return "$order";
})->where('order', '(name|surname|age)');
