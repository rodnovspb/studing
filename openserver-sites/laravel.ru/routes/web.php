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

Route::get('/', [HomeController::class, 'index']);
//Route::get('/test', [HomeController::class, 'test']);
//Route::get('/page/{slug}', [PageController::class, 'show']);
//Route::get('/test2', [TestController::class, 'test']);

Route::resource('/posts', PostController::class, ['parameters' => [
    'posts' => 'slug'
]]);

Route::resource('/robots', RobotController::class);





















Route::fallback(function (){
   abort(404, 'не найдена');
});


