<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Booking\ManageBookingServiceInterface;
use App\Models\Booking;

class ManageBookingController extends Controller
{
    /**
     * report interface
     */
    private $bookingInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ManageBookingServiceInterface $bookingServiceInterface)
    {
        $this->bookingInterface = $bookingServiceInterface;
    }
    /**
     * To show report view
     *
     * @return View report
     */
    public function manageBooking()
    {
        $bookingList = $this->bookingInterface->manageBooking();
        return view('booking.index', compact('bookingList'));
        // print_r($bookingList);

    }
    // public function deleteBooking($id){
    //     return $this->bookingInterface->deleteBooking($id);

    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $Booking
     * @return \Illuminate\Http\Response
     */
    public function deleteBooking(Booking $booking)
    {
        $this->bookingInterface->deleteBooking($booking);
    }
}
