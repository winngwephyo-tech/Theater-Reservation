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
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Theater\TheaterDaoInterface', 'App\Dao\Theater\TheaterDao');
        $this->app->bind('App\Contracts\Dao\Seat\SeatDaoInterface', 'App\Dao\Seat\SeatDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Theater\TheaterServiceInterface', 'App\Services\Theater\TheaterService');
        $this->app->bind('App\Contracts\Services\Seat\SeatServiceInterface', 'App\Services\Seat\SeatService');
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
