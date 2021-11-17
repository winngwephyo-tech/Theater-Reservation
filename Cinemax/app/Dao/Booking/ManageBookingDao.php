<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\ManageBookingDaoInterface;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for report
 */
class ManageBookingDao implements ManageBookingDaoInterface
{
    /**
     * Show Manage Booking
     * From Users Table
     * From Seats Table
     * From Show Time Table
     * Calcutate  Price
     */
    public function manageBooking()
    {
        $bookingList = DB::table('bookings')
            ->join('movies', 'bookings.movie_id', '=', 'movies.id')
            ->join('seats', 'bookings.seat_display_id', '=', 'seats.display_id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('showtimes', 'bookings.showtime_id', '=', 'showtimes.id')
            ->select('bookings.id', 'users.name', 'movies.title', 'seats.display_id', 'showtimes.showtime', 'seats.roll')
            ->get();
        return $bookingList;
    }
    /**
     * delete
     * @param $Booking
     */
    public function deleteBooking($booking)
    {
        $booking->delete();
    }
}
