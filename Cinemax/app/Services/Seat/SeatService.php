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
     * @param SeatDaoInterface
     * @return
     */
    public function __construct(SeatDaoInterface $seatDao)
    {
        $this->seatDao = $seatDao;
    }
    /**
     * To add seats
     * @param $request request with inputs, $theater_id
     */
    public function addSeats($request, $theater_id)
    {
        $this->seatDao->addSeats($request, $theater_id);
    }
}
