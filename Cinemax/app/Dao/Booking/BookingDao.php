<?php

namespace App\Dao\Booking;

use App\Contracts\Dao\Booking\BookingDaoInterface;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Report;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;

/**
 * Data accessing object for booking
 */
class BookingDao implements BookingDaoInterface
{
    /**
     * To add bookings
     * @param $request, $movie_id, $showtime_id
     */
    public function addBooking($request, $movie_id, $showtime_id)
    {
        foreach ($request->addmore as $key => $value) {

            //for booking table

            $roll = $value['roll'];
            $number = $value['number'];
            $display_id = $roll . $number;
            $data = ['user_id' => 1, 'movie_id' => $movie_id, 'showtime_id' => $showtime_id,
                'seat_display_id' => $display_id, 'is_booked' => 1];
            Booking::create($data);

            
            //for report table

            $price = Seat::where('display_id', '=', $display_id)->value('price');
            if (Report::where('movie_id', '=', $movie_id)->exists()) {
                $income = Report::where('movie_id', '=', $movie_id)->value('income');
            } else {
                $income = 0;
            }
            $income += $price;
            $rating = Movie::where('id', '=', $movie_id)->value('rating');
            Report::updateOrCreate(
                ['movie_id' => $movie_id],
                ['income' => $income, 'rating' => $rating]
            );
        }

    }
}
