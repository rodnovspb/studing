<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false

]);

Route::get('reset', [ResetController::class, 'reset'])->name('reset');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware(['auth'])->group(function (){

    Route::group([
        'prefix' => 'person',
        'namespace' => 'Person',
        'as' => 'person.'
                 ], function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
    });

    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'is_admin'], function(){
            Route::get('/orders', [OrderController::class, 'index'])->name('home');
            Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
        });

        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    });
});

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');

Route::group(['middleware' => 'set_locale'], function(){
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');

    Route::group(['prefix' => 'basket'], function(){
        Route::post('/add/{id}', [BusketController::class, 'basketAdd'])->name('busket-add');

        Route::group(['middleware' => 'basket_not_empty',], function(){
            Route::get('/', [BusketController::class, 'basket'])->name('basket');
            Route::get('/place', [BusketController::class, 'basketPlace'])->name('basket-place');
            Route::post('/confirm', [BusketController::class, 'basketConfirm'])->name('basket-confirm');
            Route::post('/remove/{id}', [BusketController::class, 'basketRemove'])->name('busket-remove');
        });
    });



    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
});





































