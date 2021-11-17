<?php

namespace App\Http\Controllers\Booking;

use App\Contracts\Services\Booking\BookingServiceInterface;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
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


  public function index()
  {
    $booking = $this->bookingInterface->getConfirmInfo();
    return view('confirm_booking.booking', compact('booking'));
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function confirmBooking()
  {
    $booking = $this->bookingInterface->getConfirmInfo();
    return view('confirm_booking.booking', compact('booking'));
    // print_r($booking);
  }
}
