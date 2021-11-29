<?php

namespace App\Contracts\Dao\Booking;

/**
 * Interface for Data Accessing Object of Report
 */
interface ManageBookingDaoInterface
{
    /**
     * To show booking view
     *
     * @return $bookinglist
     */
    public function manageBooking();
    /**
     * delete by Booking Id 
     */
    public function deleteBooking($booking);
    /**
     * delete all booking
     */
    public function deleteAll();

    /**
     * search name
     * @param $request
     */
    public function searchName($request);
}
