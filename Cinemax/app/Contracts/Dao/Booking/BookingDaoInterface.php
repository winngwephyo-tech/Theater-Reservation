<?php

namespace App\Contracts\Dao\Booking;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Booking
 */
interface BookingDaoInterface
{
    /**
     * To get all seats
     * @param $movie_id, $showtime_id
     */
    public function getSeats($movie_id, $showtime_id);
    /**
     * To get booked seats
     * @param $movie_id, $showtime_id
     */
    public function getBookedSeats($movie_id, $showtime_id);
    /**
     * To add booking
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id);
}