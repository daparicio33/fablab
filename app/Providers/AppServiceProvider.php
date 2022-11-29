<?php

namespace App\Providers;

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
        /* $this->app->bind('path.public',function(){
            return '/home/idexounk/fablab.idexperujapon.edu.pe'; 
        }); */
        require_once  __DIR__ . '/../Http/helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
