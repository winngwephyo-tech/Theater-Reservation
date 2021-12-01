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
     * To get theaterId
     * @param int $movie_id
     */
    public function getTheaterId($movie_id);
    /**
     * To get theaterName
     * @param int $theater_id
     */
    public function getTheaterName($theater_id);
    /**
     * To add booking
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id);

}