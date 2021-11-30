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
        $theater_id = $this->bookingInterface->getTheaterId($movie_id);
        $theater_name = $this->bookingInterface->getTheaterName($theater_id);

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
        $book = $this->bookingInterface->addBooking($request, $movie_id, $showtime_id);
        if ($book == "booked") {
            return redirect()->route('booking-create', [$movie_id, $showtime_id])
                ->with('error', 'The Seat is already booked!')
                ->withInput();
        } elseif ($book == "not-available") {
            return redirect()->route('booking-create', [$movie_id, $showtime_id])
                ->with('error', 'The Seat is not available!')
                ->withInput();
        }
        else{
            return view('booking.confirm')
                ->with('movie_name', $book->movie_name)
                ->with('theater_name', $book->theater_name)
                ->with('seats', $book->seats)
                ->with('showtime', $book->showtime)
                ->with('fee', $book->fee);
        }
    }
}
