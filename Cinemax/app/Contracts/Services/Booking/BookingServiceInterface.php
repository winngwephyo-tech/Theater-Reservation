<?php

namespace App\Contracts\Services\Booking;

interface BookingServiceInterface{
    /**
     * Confirm user Booking Information
     */
    public function getConfirmInfo();
    /**
     * Manage Booking list
     */
    public function manageBooking();
}