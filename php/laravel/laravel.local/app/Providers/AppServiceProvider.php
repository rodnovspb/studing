<?php

namespace App\Providers;

use Core\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route as RoutePattern;

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
    public function boot()
    {
        RoutePattern::pattern('id', '[0-9]+');
        RoutePattern::pattern('slug', '[\w-]+');
    }
}
