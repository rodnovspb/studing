<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PractiseController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormselfController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\Component;
use App\Http\Controllers\Block;
use App\Http\Controllers\MenuController;

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

Route::get('/menu', [MenuController::class, 'showMenu']);
Route::get('/showwithcomponent', [UserController::class, 'showwithcomponent']);
Route::get('/block', [Block::class, 'show']);
Route::get('/component', [Component::class, 'show']);
Route::get('/unsubscribe', [DeveloperController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('/url', [DeveloperController::class, 'url'])->name('developer.url');
Route::get('/add-developers', [DeveloperController::class, 'form']);
Route::get('/edit/{id}', [DeveloperController::class, 'edit']);
Route::get('/developers', [DeveloperController::class, 'all']);
Route::post('/developers', [DeveloperController::class, 'all']);
Route::get('/test/method/', [LoginController::class, 'tasks']);
Route::post('/id-login/{id}/{login}', [LoginController::class, 'login']);
Route::get('/id-login/{id}/{login}', [LoginController::class, 'login']);
Route::match(['get', 'post'], '/formself', [FormselfController::class, 'formself']);
Route::get('/formpost', [FormController::class, 'formpost']);
Route::post('/resultpost', [FormController::class, 'resultpost']);
Route::get('/form', [FormController::class, 'form']);
Route::get('/result', [FormController::class, 'result']);
Route::get('/mark', [MarkController::class, 'show']);
Route::get('/lesson/{id}', [LessonController::class, 'show']);
Route::get('/student', [StudentController::class, 'show']);
Route::get('/worker', [WorkerController::class, 'show']);
Route::get('/showcountry', [CityController::class, 'showcountry']);
Route::get('/country', [CountryController::class, 'show']);
Route::get('/profile', [ProfileController::class, 'show']);
Route::get('/account', [AccountController::class, 'show']);
Route::get('/getmodel', [PostController::class, 'getWithModel']);
Route::get('/model', [CityController::class, 'getWithModel']);
Route::get('/users', [UserController::class, 'get']);
Route::get('/index', [UserController::class, 'index']);
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





