<?php

namespace App\Contracts\Services\Booking;

/**
 * Interface for Data Accessing Object of Report
 */
interface ManageBookingServiceInterface
{
   /**
     * To show booking view
     *
     * @return $bookinglist
     */
    public function manageBooking();
}