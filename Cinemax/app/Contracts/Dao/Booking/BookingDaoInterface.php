<?php

namespace App\Contracts\Dao\Booking;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Booking
 */
interface BookingDaoInterface
{
    /**
     * To add booking
     * @param $request request inputs
     */
    public function addBooking($request);
}