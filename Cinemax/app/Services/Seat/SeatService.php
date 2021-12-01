<?php

namespace App\Services\Seat;

use App\Contracts\Dao\Seat\SeatDaoInterface;
use App\Contracts\Services\Seat\SeatServiceInterface;

/**
 * Service class for seat.
 */
class SeatService implements SeatServiceInterface
{
    /**
     * seat dao
     */
    private $seatDao;
    /**
     * Class Constructor
     * @param SeatDaoInterface $seatDao
     * @return void
     */
    public function __construct(SeatDaoInterface $seatDao)
    {
        $this->seatDao = $seatDao;
    }
    /**
     * To add seats
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int $theater_id
     */
    public function addSeats($request, $theater_id)
    {
       return $this->seatDao->addSeats($request, $theater_id);
    }
    /**
     * To delete seats
     * @param  Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteSeats($theater_id)
    {
       return $this->seatDao->deleteSeats($theater_id);
    }
}
