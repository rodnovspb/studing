<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
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


Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/register', [MainController::class, 'create_user'])->name('create_user');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('main');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('/inner', [MainController::class, 'inner'])->name('inner');

Route::get('/cabinet', [MainController::class, 'cabinet'])->middleware('auth.basic');

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


