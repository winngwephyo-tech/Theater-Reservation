<?php

namespace App\Contracts\Dao\Booking;

use App\Models\Booking;

/**
 * Interface for Data Accessing Object of Report
 */
interface ManageBookingDaoInterface
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
     * @return void
     */
    public function deleteBooking($booking);
    /**
     * delete all booking
     * @return void
     */
    public function deleteAll();

    /**
     * search booking user name
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchName($request);
}
