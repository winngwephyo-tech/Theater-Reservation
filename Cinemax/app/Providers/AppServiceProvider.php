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
        $this->app->bind('App\Contracts\Dao\UpcommingMovieDaoInterface', 'App\Dao\UpcommingMovieDao');
        $this->app->bind('App\Contracts\Services\UpcommingMovieServiceInterface', 'App\Services\UpcommingMovieService');
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
