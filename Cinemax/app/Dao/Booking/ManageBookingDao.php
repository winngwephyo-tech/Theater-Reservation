<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\ManageBookingDaoInterface;
use App\Models\Booking;
use App\Models\Report;
use App\Models\Seat;
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
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->join('showtimes', 'bookings.showtime_id', '=', 'showtimes.id')
        ->select('bookings.id', 'users.name', 'movies.title', 'bookings.seat_display_id', 'showtimes.showtime','bookings.price')
        ->get();
    return $bookingList;
    }
    /**
     * Report table
     * for cancel booking recalculate price
     * delete
     * @param $Booking
     */
    public function deleteBooking($booking)
    {
        $book = Booking::find($booking);
        if ($book) {
            $movie_id = Booking::where('id', '=', $booking)->value('movie_id');
            if (Report::where('movie_id', '=', $movie_id)->exists()) {
                $display_id = Booking::where('id', '=', $booking)->value('seat_display_id');
                $price = Seat::where('display_id', '=', $display_id)->value('price');
                $income = Report::where('movie_id', '=', $movie_id)->value('income');
                $income -= $price;
                Report::where('movie_id', $movie_id)
                    ->update(['income' => $income]);
            }
            $book->forceDelete();
            return redirect()->route('booking.index');
        }
        return 'booking Not Found!';
    }
}
