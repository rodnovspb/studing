<?php

namespace App\Providers;

use App\Models\Rubric;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        Paginator::useBootstrap();
        view()->composer('layouts.footer', function($view){
            $view->with('rubrics', Rubric::all());
        });

//        DB::listen(function ($query){
//            Log::warning($query->sql);
//        });

    }
}
