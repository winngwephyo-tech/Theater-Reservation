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
        $this->app->bind('App\Contracts\Dao\Booking\BookingDaoInterface', 'App\Dao\Booking\BookingDao');
        $this->app->bind('App\Contracts\Dao\Report\ReportDaoInterface', 'App\Dao\Report\ReportDao');
        $this->app->bind('App\Contracts\Dao\Movie\MovieDaoInterface', 'App\Dao\Movie\MovieDao');
        $this->app->bind('App\Contracts\Dao\UpcomingMovieDaoInterface', 'App\Dao\UpcomingMovieDao');


        // Business logic registration
        $this->app->bind('App\Contracts\Services\Booking\BookingServiceInterface', 'App\Services\Booking\BookingService');
        $this->app->bind('App\Contracts\Services\Movie\MovieServiceInterface', 'App\Services\Movie\MovieService');
        $this->app->bind('App\Contracts\Services\Report\ReportServiceInterface', 'App\Services\Report\ReportService');
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
