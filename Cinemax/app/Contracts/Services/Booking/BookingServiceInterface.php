<?php

namespace App\Contracts\Services\Booking;

use Illuminate\Http\Request;

/**
 * Interface for booking service
 */
interface BookingServiceInterface
{
    /**
     * To add booking
     * @param $request request with inputs
     */
    public function addBooking($request);

}