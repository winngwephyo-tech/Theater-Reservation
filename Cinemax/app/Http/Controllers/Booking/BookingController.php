<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;
use App\Contracts\Services\Booking\BookingServiceInterface;
use Illuminate\Support\Facades\DB;

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
        $theater_id = DB::table('movies')->where('id', $movie_id)->value('theater_id');
        $seats = DB::table('seats')->where('theater_id', $theater_id)->get();

        return view('booking.create_booking', compact('seats'))
        ->with('movie_id', $movie_id)
        ->with('showtime_id', $showtime_id);
    }
    /**
     * To check booking create form and redirect to confirm page.
     * @param Request $request, $movie_id, $showtime_id
     * @return View booking create confirm
     */
    public function submitBooking(Request $request, $movie_id, $showtime_id)
    {
        $this->bookingInterface->addBooking($request, $movie_id, $showtime_id);
    }
}
