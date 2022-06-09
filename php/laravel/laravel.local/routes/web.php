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
use App\Http\Controllers\BookController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserlistController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\VisitController;
use App\Http\Middleware\CounterOfVisits;
use App\Http\Controllers\AuthController;

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



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::get('/visit', [VisitController::class, 'count'])->middleware('countvisits');
Route::get('/reg', [RegController::class, 'reg']);
Route::post('/reg', [RegController::class, 'sendToDB']);
Route::get('/project', [ResponseController::class, 'project']);
Route::get('/getform', [ResponseController::class, 'getForm']);
Route::get('/form-saveflash', [ResponseController::class, 'form']);
Route::get('/getflash', [ResponseController::class, 'getflash']);
Route::get('/flash', [ResponseController::class, 'flash']);
Route::get('/res-view-cookie-header', [ResponseController::class, 'rvch']);
Route::get('/queue', [ResponseController::class, 'queue']);
Route::get('/count-cookie', [ResponseController::class, 'count']);
Route::get('/getcookie', [ResponseController::class, 'get']);
Route::get('/cookie', [ResponseController::class, 'setcookie']);
Route::get('/response', [ResponseController::class, 'response']);
Route::get('/showparam', [UserlistController::class, 'showparam'])->name('showparam');
Route::get('/param/{var}', [UserlistController::class, 'param'])->name('param');
Route::get('/success', [UserlistController::class, 'success'])->name('success');
Route::get('/userlist', [UserlistController::class, 'userlist'])->name('userlist');
Route::post('/add-user', [UserlistController::class, 'add']);
Route::get('/add-user', [UserlistController::class, 'form'])->name('form');
Route::get('/page/form', [RedirectController::class, 'form']);
Route::get('/page/receive-form', [RedirectController::class, 'receiveForm']);
Route::get('/page/show2', [RedirectController::class, 'show2']);
Route::get('/page/show1', [RedirectController::class, 'show1']);
Route::get('/session/{key}/{value}', [BookController::class, 'session']);
Route::get('/push/{value}', [BookController::class, 'push']);
Route::get('/setarr', [BookController::class, 'setarr']);
Route::get('/gettime', [BookController::class, 'gettime']);
Route::get('/set/{key}/{value}', [BookController::class, 'setkey']);
Route::get('/flush', [BookController::class, 'flush']);
Route::get('/get', [BookController::class, 'getVar']);
Route::get('/set/{var}', [BookController::class, 'setVar']);
Route::get('/forget/{key}', [BookController::class, 'forget']);
Route::get('/anonim', [BookController::class, 'anonim']);
Route::get('/time', [BookController::class, 'time']);
Route::get('/count', [BookController::class, 'count']);
Route::get('/book/get', [BookController::class, 'getSession']);
Route::get('/book/{value}', [BookController::class, 'setSession']);
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





