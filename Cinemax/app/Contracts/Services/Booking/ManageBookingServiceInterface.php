<?php

namespace App\Contracts\Services\Booking;

/**
 * Interface for Data Accessing Object of Report
 */
interface ManageBookingServiceInterface
{
  /**
   * To show booking view
   *
   * @return $bookinglist
   */
  public function manageBooking();
  /**
   * delete by booking id
   */
  public function deleteBooking($booking);

       /**
     * search name
     * @param $request
     */
    public function searchName($request);
}
