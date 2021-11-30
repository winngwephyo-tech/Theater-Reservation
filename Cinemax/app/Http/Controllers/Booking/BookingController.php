<?php

namespace App\Http\Controllers\Booking;

use App\Contracts\Services\Booking\BookingServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

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
    public function createBooking($movie_id, $showtime_id)
    {
        $seats = $this->bookingInterface->getSeats($movie_id, $showtime_id);
        $booked = $this->bookingInterface->getBookedSeats($movie_id, $showtime_id);
        $theater_id = Movie::where('id', '=', $movie_id)->value('theater_id');
        $theater_name = Theater::where('id', '=', $theater_id)->value('name');

        return view('booking.create', compact('seats', 'booked'))
            ->with('movie_id', $movie_id)
            ->with('showtime_id', $showtime_id)
            ->with('theater_name', $theater_name);
    }
    /**
     * To check booking create form and redirect to confirm page.
     * @param Request $request, $movie_id, $showtime_id
     * @return View booking create confirm
     */
    public function submitBooking(Request $request, $movie_id, $showtime_id)
    {
        return $this->bookingInterface->addBooking($request, $movie_id, $showtime_id);
    }
}
