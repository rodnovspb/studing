<?php

use App\Http\Controllers\ShopController;
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

Route::get('/catalog', [ShopController::class, 'catalog']);
Route::post('/create-order', [ShopController::class, 'createOrder']);
Route::post('/approve-order/{id}', [ShopController::class, 'approveOrder']);
