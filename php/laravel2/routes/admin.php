<?php

use Illuminate\Support\Facades\Route;

Route::middleware("guest:admin")->group(function (){
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});

Route::middleware("auth:admin")->group(function (){
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});
