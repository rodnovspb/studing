<?php


use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RobotController;
use App\Http\Controllers\Test\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/page/about', [PageController::class, 'show'])->name('page.about');






















Route::fallback(function (){
   abort(404, 'не найдена');
});

