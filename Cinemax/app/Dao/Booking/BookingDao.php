<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Report;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Theater;
use Auth;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for booking
 */
class BookingDao implements BookingDaoInterface
{
    /**
     * To get all seats
     * @param Movie $movie_id 
     * @param Showtime $showtime_id
     */
    public function getSeats($movie_id, $showtime_id)
    {
        $theater_id = DB::table('movies')->where('id', $movie_id)->value('theater_id');
        $seats = DB::table('seats')->where('theater_id', $theater_id)->get();
        return $seats;
    }
    /**
     * To get booked seats
     *@param Movie $movie_id 
     * @param Showtime $showtime_id
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
     * To get theaterId
     * @param int $movie_id
     */
    public function getTheaterId($movie_id)
    {
        $theater_id = Movie::where('id', '=', $movie_id)->value('theater_id');
        return $theater_id;
    }
    /**
     * To get theaterName
     * @param int $theater_id
     */
    public function getTheaterName($theater_id)
    {
        $theater_name = Theater::where('id', '=', $theater_id)->value('name');
        return $theater_name;
    }
    /**
     * To add bookings
     * @param Movie $movie_id 
     * @param Showtime $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        $user = Auth::user()->id;
        $movie_name = Movie::where('id', '=', $movie_id)->value('title');
        $showtime = Showtime::where('id', '=', $showtime_id)->value('showtime');
        $booking_error = '';
        $validated = '';
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
                $booking_error = "booked";
            }

            //check if the seat is validated
            if (Seat::where('display_id', '=', $display_id)
                ->where('theater_id', '=', $theater_id)
                ->exists()
            ) {
                continue;
            } else {
                $validated = "not-available";
            }
        }

        if ($booking_error > 0) {

            return $booking_error;

        } elseif ($validated > 0) {

            return $validated;

        } else {

            $income = 0;
            $fee = 0;
            $seatString = "";

            foreach ($request->addmore as $key => $value) {

                $roll = strtoupper($value['roll']);
                $number = $value['number'];
                $display_id = $roll . $number;
                $price = Seat::where('display_id', '=', $display_id)->value('price');

                $data = ['user_id' => $user,
                         'theater_id'=> $theater_id,
                         'movie_id' => $movie_id,
                         'showtime_id' => $showtime_id,
                         'seat_display_id' => $display_id,
                         'price' => $price, 'is_booked' => 1];
                DB::transaction(function () use ($data) {
                    Booking::create($data);
                });

                //for report table

                $fee += $price;
                $seatString .= $display_id . ",";
                if (Report::where('movie_id', '=', $movie_id)->exists()) {
                    $income = Report::where('movie_id', '=', $movie_id)->value('income');
                }
                $income += $price;
                $rating = Movie::where('id', '=', $movie_id)->value('rating');

                DB::transaction(function () use ($movie_id, $income, $rating) {
                    Report::updateOrCreate(
                        ['movie_id' => $movie_id],
                        ['income' => $income, 'rating' => $rating]
                    );
                });
            }

            $data = array(
                'movie_name' => $movie_name,
                'theater_name' => $theater_name,
                'seats' => $seatString,
                'showtime' => $showtime,
                'fee' => $fee,
            );
            return (object) $data;
        }
    }
}
