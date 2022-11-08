<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
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
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('routeactive', function ($route){
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"active\"' : '' ?>";
        });

        Blade::if('admin', function (){
            return Auth::check() && Auth::user()->isAdmin();
        });
    }
}
