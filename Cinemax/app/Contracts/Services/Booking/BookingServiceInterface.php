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
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id);

}