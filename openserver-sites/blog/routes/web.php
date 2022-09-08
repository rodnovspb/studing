<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'index']);

Route::get('/category/{slug}', [BlogController::class, 'getPostsByCat'])->name('getPostsByCat');

Route::get('/category/{slug_cat}/{slug_post}', [BlogController::class, 'getPost'])->name('getPost');



























