<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
//        require_once '../show.php';

        Route::pattern('id', '[0-9]+');

        View::share('key', 'Денис');

        view()->composer(['index', 'page'], function ($view) {
            $view->with('qqq', User::query()->get());
        });

        Blade::directive('mydir', function ($var){
            return pow($var, 10);
        });

       /* DB::listen(function ($query){
            dd($query);
        });*/

    }
}
