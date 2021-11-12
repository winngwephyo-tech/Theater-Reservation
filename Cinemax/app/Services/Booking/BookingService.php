<?php

namespace App\Services\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Contracts\Services\Booking\BookingServiceInterface;

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
     * @param BookingDaoInterface
     * @return
     */
    public function __construct(BookingDaoInterface $bookingDao)
    {
        $this->bookingDao = $bookingDao;
    }
    /**
     * To get all seats
     * @param $movie_id, $showtime_id
     */
    public function getSeats($movie_id, $showtime_id)
    {
        return $this->bookingDao->getSeats($movie_id, $showtime_id);
    }
    /**
     * To get booked seats
     * @param $movie_id, $showtime_id
     */
    public function getBookedSeats($movie_id, $showtime_id)
    {
        return $this->bookingDao->getBookedSeats($movie_id, $showtime_id);
    }
    /**
     * To add booking
     * @param $request , $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        return $this->bookingDao->addBooking($request, $movie_id, $showtime_id);
    }
}