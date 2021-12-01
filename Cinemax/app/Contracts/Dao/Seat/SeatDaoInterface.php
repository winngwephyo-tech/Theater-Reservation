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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int $theater_id
     */
    public function addSeats($request, $theater_id);
    /**
     * To delete seats
     * @param  int $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteSeats($theater_id);
}
