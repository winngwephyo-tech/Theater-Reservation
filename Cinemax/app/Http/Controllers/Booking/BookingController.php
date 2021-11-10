<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Contracts\Services\Booking\BookingServiceInterface;

class BookingController extends Controller
{
    /**
     * booking interface
     */
    private $bookingInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingServiceInterface $bookingServiceInterface)
    {
        $this->bookingInterface = $bookingServiceInterface;
    }
    /**
     * To show create booking view
     *
     * @return View create booking
     */
    public function createBooking()
    {
        return view('booking.create_booking');
    }
    /**
     * To check booking create form and redirect to confirm page.
     * @param Request $request Request form booking create
     * @return View booking create confirm
     */
    public function submitBooking(Request $request)
    {
        $this->bookingInterface->addBooking($request);
    }
}
