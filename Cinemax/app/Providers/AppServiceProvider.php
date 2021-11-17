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
        $this->app->bind('App\Contracts\Dao\Report\ReportDaoInterface', 'App\Dao\Report\ReportDao');
        $this->app->bind('App\Contracts\Dao\Movie\MovieDaoInterface', 'App\Dao\Movie\MovieDao');
        $this->app->bind('App\Contracts\Dao\Booking\ManageBookingDaoInterface', 'App\Dao\Booking\ManageBookingDao');


        // Business logic registration
        $this->app->bind('App\Contracts\Services\Movie\MovieServiceInterface', 'App\Services\Movie\MovieService');
        $this->app->bind('App\Contracts\Services\Report\ReportServiceInterface', 'App\Services\Report\ReportService');
        $this->app->bind('App\Contracts\Services\Booking\ManageBookingServiceInterface', 'App\Services\Booking\ManageBookingService');

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
