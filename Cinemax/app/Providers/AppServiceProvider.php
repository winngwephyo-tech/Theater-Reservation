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
        $this->app->bind('App\Contracts\Dao\UpMovie\UpMovieDaoInterface', 'App\Dao\UpMovie\UpMovieDao');
        $this->app->bind('App\Contracts\Services\UpMovie\UpMovieServiceInterface', 'App\Services\UpMovie\UpMovieService');

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
