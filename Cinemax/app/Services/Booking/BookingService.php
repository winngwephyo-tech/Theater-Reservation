<?php

namespace App\Services\Booking;

use App\Contracts\Services\Booking\BookingServiceInterface;
use App\Dao\Booking\BookingDao;

class BookingService implements BookingServiceInterface
{
  private $bookingDao;
  public function __construct(BookingDao $bookingDao)
  {
    $this->bookingDao = $bookingDao;
  }
  public function getConfirmInfo()
  {
    return $this->bookingDao->getConfirmInfo();
  }
  public function manageBooking(){
    return $this->bookingDao->manageBooking();
  }
}
