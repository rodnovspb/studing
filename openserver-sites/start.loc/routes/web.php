<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::post('/', [MainController::class, 'store'])->name('store');

Route::any('/page', [PageController::class, 'index'])->name('page');

Route::get('/user/{user}', function (User $user) {
    return $user;
});


Route::resource('users', UserController::class)->missing(function (Request $request) {
    return redirect()->route('users.index');
});

Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    return redirect()->back();
});

Route::fallback(function (){
    return redirect('/');
});


