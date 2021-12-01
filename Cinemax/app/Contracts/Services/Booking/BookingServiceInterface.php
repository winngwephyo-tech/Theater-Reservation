<?php

namespace App\Contracts\Services\Booking;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

/**
 * Interface for booking service
 */
interface BookingServiceInterface
{
    /**
     * To get all seats
     * @param Movie $movie_id 
     * @param Showtime $showtime_id 
     * @return Object $seat seat object
     */
    public function getSeats($movie_id, $showtime_id);
    /**
     * To get booked seats
     * @param Movie $movie_id 
     * @param Showtime $showtime_id 
     * @return Object $seat 
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
     * @param Movie $movie_id 
     * @param Showtime $showtime_id 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addBooking($request, $movie_id, $showtime_id);
}
