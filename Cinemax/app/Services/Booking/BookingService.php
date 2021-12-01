<?php

namespace App\Services\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Contracts\Services\Booking\BookingServiceInterface;
use App\Models\Showtime;

/**
 * Service class for booking.
 */
class BookingService implements BookingServiceInterface
{
    /**
     * booking dao
     */
    private $bookingDao;
    /**
     * Class Constructor
     * @param BookingDaoInterface $bookingDao
     * @return void
     */
    public function __construct(BookingDaoInterface $bookingDao)
    {
        $this->bookingDao = $bookingDao;
    }
    /**
     * To get all seats
     * @param  Movie $movie_id
     * @param Showtime $showtime_id
     */
    public function getSeats($movie_id, $showtime_id)
    {
        return $this->bookingDao->getSeats($movie_id, $showtime_id);
    }
    /**
     * To get booked seats
     * @param  Movie $movie_id
     * @param Showtime $showtime_id
     */
    public function getBookedSeats($movie_id, $showtime_id)
    {
        return $this->bookingDao->getBookedSeats($movie_id, $showtime_id);
    }
    /**
     * To get theaterId
     * @param int $movie_id
     */
    public function getTheaterId($movie_id)
    {
        return $this->bookingDao->getTheaterId($movie_id);
    }
    /**
     * To get theaterName
     * @param int $theater_id
     */
    public function getTheaterName($theater_id)
    {
        return $this->bookingDao->getTheaterName($theater_id);
    }
    /**
     * To add booking
     * @param  Movie $movie_id
     * @param Showtime $showtime_id
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        return $this->bookingDao->addBooking($request, $movie_id, $showtime_id);
    }
}
