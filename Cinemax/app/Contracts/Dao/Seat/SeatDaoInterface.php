<?php

namespace App\Contracts\Dao\Seat;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Seat
 */
interface SeatDaoInterface
{
    /**
     * To add seats
     * @param $request request with inputs, $theater_id
     */
    public function addSeats($request, $theater_id);
    /**
     * To delete seats
     * @param $theater_id
     */
    public function deleteSeats($theater_id);
}
