<?php

namespace App\Dao\Seat;

use App\Contracts\Dao\Seat\SeatDaoInterface;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $roll = strtoupper($value['roll']);
            $number = $value['number'];
            $price = $value['price'];
            for ($i = 1; $i <= $number; $i++) {
                $display_id = $roll . $i;

                $data = ['roll' => $roll,
                         'display_id' => $display_id,
                         'theater_id' => $theater_id,
                         'price' => $price];
                DB::transaction(function () use ($data) {
                    Seat::create($data);
                });
            }
        }
    }
    /**
     * To delete seats
     * @param $theater_id
     */
    public function deleteSeats($theater_id)
    {
        DB::transaction(function () use ($theater_id) {
            Seat::where('theater_id', '=', $theater_id)->delete();
        });
    }
}
