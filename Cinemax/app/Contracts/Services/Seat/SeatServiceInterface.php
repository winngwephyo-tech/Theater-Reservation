<?php

namespace App\Contracts\Services\Seat;

use App\Models\Theater;

/**
 * Interface for seat service
 */
interface SeatServiceInterface
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
     * @param  Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteSeats($theater_id);

}
