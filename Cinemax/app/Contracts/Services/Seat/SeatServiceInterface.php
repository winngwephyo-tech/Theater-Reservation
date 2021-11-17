<?php

namespace App\Contracts\Services\Seat;

use Illuminate\Http\Request;

/**
 * Interface for seat service
 */
interface SeatServiceInterface
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
