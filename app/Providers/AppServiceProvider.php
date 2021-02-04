<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Parents;
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
        //
        view()->composer('*', function($view){
            $countUnapproveForm = Parents::where('approval', null)->count();
            if (auth()->check()) {
                view()->share('countUnapproveForm', $countUnapproveForm);
            }
        });
    }
}
