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
        $this->app->bind('App\Contracts\Dao\UpcomingMovieDaoInterface', 'App\Dao\UpcomingMovieDao');
        $this->app->bind('App\Contracts\Services\UpcomingMovieServiceInterface', 'App\Services\UpcomingMovieService');
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
