<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;

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

Route::get('/user/age', [UserController::class, 'getage']);
Route::get('/user/salary/{salary}', [UserController::class, 'getsalary']);
Route::get('/user/sex/{sex}', [UserController::class, 'getsex']);
Route::get('/user/{name}/{surname}', [PostController::class, 'showUser']);
Route::get('/post/view', [PostController::class, 'view']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/weather/{city}', [WeatherController::class, 'getweather']);





