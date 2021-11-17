<?php

namespace App\Contracts\Services\Booking;

use Illuminate\Http\Request;

/**
 * Interface for booking service
 */
interface BookingServiceInterface
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