<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PractiseController;

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

Route::get('/practise', [PractiseController::class, 'getpage']);
Route::get('/user/page/{page}', [UserController::class, 'getpage']);
Route::get('/user/age', [UserController::class, 'getage']);
Route::get('/user/salary/{salary}', [UserController::class, 'getsalary']);
Route::get('/user/sex/{sex}', [UserController::class, 'getsex']);
Route::get('/user/{name}/{surname}', [PostController::class, 'showUser']);
Route::get('/post/collection', [PostController::class, 'func']);
Route::get('/post/view', [PostController::class, 'view']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/weather/{city}', [WeatherController::class, 'getweather']);




