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
     * To add booking
     * @param $request , $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        return $this->bookingDao->addBooking($request, $movie_id, $showtime_id);
    }
}