<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Booking\ManageBookingServiceInterface;

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
    }
}