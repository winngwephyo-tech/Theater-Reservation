<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Report;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for booking
 */
class BookingDao implements BookingDaoInterface
{
    /**
     * To get all seats
     * @param $movie_id, $showtime_id
     */
    public function getSeats($movie_id, $showtime_id)
    {
        $theater_id = DB::table('movies')->where('id', $movie_id)->value('theater_id');
        $seats = DB::table('seats')->where('theater_id', $theater_id)->get();
        return $seats;
    }
    /**
     * To get booked seats
     * @param $movie_id, $showtime_id
     */
    public function getBookedSeats($movie_id, $showtime_id)
    {
        $booked = DB::table('bookings')
            ->where('movie_id', $movie_id)
            ->where('showtime_id', $showtime_id)
            ->pluck('seat_display_id');

        if ($booked->isEmpty()) {
            $booked[] = 'AA';
        }

        return $booked;
    }
    /**
     * To add bookings
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        $movie_name = Movie::where('id', '=', $movie_id)->value('title');
        $booking_error = 0;
        $validated = 0;
        foreach ($request->addmore as $key => $value) {
            //for booking table

            $roll = strtoupper($value['roll']);
            $number = $value['number'];
            $display_id = $roll . $number;
            $theater_id = Movie::where('id', '=', $movie_id)->value('theater_id');
            $theater_name = Theater::where('id', '=', $theater_id)->value('name');

            //check if the seat is alread booked or not
            if (Booking::where('seat_display_id', '=', $display_id)
                ->where('movie_id', '=', $movie_id)
                ->where('showtime_id', '=', $showtime_id)
                ->exists()) {
                $booking_error += 1;
            }

            //check if the seat is validated
            if (Seat::where('display_id', '=', $display_id)
                ->where('theater_id', '=', $theater_id)
                ->exists()) {
                continue;
            } else {
                $validated = 1;
            }
        }

        if ($booking_error > 0) {
            return redirect()->route('booking.create', [$movie_id, $showtime_id])
                ->with('error', 'The Seat is already booked!');
        } elseif ($validated > 0) {
            return redirect()->route('booking.create', [$movie_id, $showtime_id])
                ->with('error', 'The Seat is not available!');
        } else {

            $income = 0;
            $fee = 0;
            $seatString = "";

            foreach ($request->addmore as $key => $value) {
                
                $roll = strtoupper($value['roll']);
                $number = $value['number'];
                $display_id = $roll . $number;
                $price = Seat::where('display_id', '=', $display_id)->value('price');
                $data = ['user_id' => 1, 'theater_id'=> $theater_id,'movie_id' => $movie_id, 'showtime_id' => $showtime_id,
                    'seat_display_id' => $display_id, 'price' => $price, 'is_booked' => 1];
                Booking::create($data);

                //for report table

                $fee += $price;
                $seatString .= $display_id . ",";
                if (Report::where('movie_id', '=', $movie_id)->exists()) {
                    $income = Report::where('movie_id', '=', $movie_id)->value('income');
                } else {
                }
                $income += $price;
                $rating = Movie::where('id', '=', $movie_id)->value('rating');
                Report::updateOrCreate(
                    ['movie_id' => $movie_id],
                    ['income' => $income, 'rating' => $rating]
                );
            }

            return view('booking.confirm_booking')
                ->with('movie_name', $movie_name)
                ->with('theater_name', $theater_name)
                ->with('seats', $seatString)
                ->with('fee', $fee);

        }

    }
}
