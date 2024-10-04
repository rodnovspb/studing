<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('parts.header', function($view){
            $view->with('city', Session::get('name', 'не выбран'));
        });
    }
}
