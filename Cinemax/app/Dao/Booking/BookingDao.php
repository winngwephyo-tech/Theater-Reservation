<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Models\Booking;
use Illuminate\Http\Request;

/**
 * Data accessing object for booking
 */
class BookingDao implements BookingDaoInterface
{
    /**
     * To add bookings
     * @param $request request with inputs
     */
    public function addBooking($request)
    {
    }
}