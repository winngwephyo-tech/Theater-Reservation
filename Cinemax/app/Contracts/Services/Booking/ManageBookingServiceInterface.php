<?php

namespace App\Contracts\Services\Booking;

use App\Models\Booking;

/**
 * Interface for Data Accessing Object of Report
 */
interface ManageBookingServiceInterface
{
  /**
   * To show booking view
   *
   * @return object $bookinglist
   */
  public function manageBooking();
  /**
   * delete by Booking Id 
   * @param Booking $booking 
   * @return \Illuminate\Http\Response
   */
  public function deleteBooking($booking);
  /**
   * delete all booking
   * @return void
   *@return \Illuminate\Http\Response
   */
  public function deleteAll();

  /**
   * search booking user name
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function searchName($request);
}
