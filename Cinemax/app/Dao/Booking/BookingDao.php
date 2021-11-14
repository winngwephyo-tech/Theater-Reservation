<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for Booking
 */
class BookingDao implements BookingDaoInterface
{
    public function getConfirmInfo()
    {
        $booking = DB::table('bookings')
            ->join('movies', 'bookings.movie_id', '=', 'movies.id')
            ->join('seats', 'bookings.seat_display_id', '=', 'seats.display_id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select('movies.title', 'movies.poster', 'movies.duration', 'seats.display_id')
            ->get();
        return $booking;
    }

    public function manageBooking()
    {
        $bookingList = DB::table('bookings')
            ->join('movies', 'bookings.movie_id', '=', 'movies.id')
            ->join('seats', 'bookings.seat_display_id', '=', 'seats.display_id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('showtimes', 'bookings.showtime_id', '=', 'showtimes.id')
            ->select('bookings.id', 'users.name', 'movies.title', 'seats.display_id', 'showtimes.showtime')
            ->get();
        return $bookingList;
    }
}
