<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Booking\ManageBookingServiceInterface;
use App\Models\Booking;
use Illuminate\Http\Request;

class ManageBookingController extends Controller
{
    /**
     * Booking interface
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
        $bookings = $this->bookingInterface->manageBooking();
        return view('booking.index')->with('bookings', $bookings);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function deleteBooking($booking)
    {
        return $this->bookingInterface->deleteBooking($booking);
    }
    /**
     * delete all from bookings
     *@return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        return $this->bookingInterface->deleteAll();
    }

    /**
     * search name
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchName(Request $request)
    {
        $bookings = $this->bookingInterface->searchName($request);
        return view('booking.index')->with('bookings', $bookings);
    }
}
