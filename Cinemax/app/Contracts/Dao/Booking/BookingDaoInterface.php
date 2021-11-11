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
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id);
}