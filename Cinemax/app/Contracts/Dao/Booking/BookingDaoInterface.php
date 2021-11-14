<?php

namespace App\Contracts\Dao\Booking;

interface BookingDaoInterface{
    /**
     * Get User Confirm Booking Information
     */
    public function getConfirmInfo();
    /**
     * Manage Booking Link
     */
    public function manageBooking();
}