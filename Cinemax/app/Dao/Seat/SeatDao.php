<?php

namespace App\Dao\Seat;

use App\Contracts\Dao\Seat\SeatDaoInterface;
use App\Models\Seat;
use Illuminate\Http\Request;

/**
 * Data accessing object for seat
 */
class SeatDao implements SeatDaoInterface
{
    /**
     * To add seats
     * @param $request request with inputs, $theater_id
     */
    public function addSeats($request, $theater_id)
    {
        foreach ($request->addmore as $key => $value) {
            $roll = $value['roll'];
            $number = $value['number'];
            $price = $value['price'];
            for ($i = 1; $i <= $number; $i++) {
                $display_id = $roll . $i;

                $data = ['roll' => $roll, 'display_id' => $display_id, 'theater_id' => $theater_id, 'price' => $price];
                Seat::create($data);
            }
        }
    }
}
