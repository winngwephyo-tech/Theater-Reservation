<?php

namespace App\Services\Theater;

use App\Contracts\Dao\Theater\TheaterDaoInterface;
use App\Contracts\Services\Theater\TheaterServiceInterface;

/**
 * Service class for theater.
 */
class TheaterService implements TheaterServiceInterface
{
    /**
     * theater dao
     */
    private $theaterDao;
    /**
     * Class Constructor
     * @param TheaterDaoInterface
     * @return
     */
    public function __construct(TheaterDaoInterface $theaterDao)
    {
        $this->theaterDao = $theaterDao;
    }
    /**
     * To add theater
     * @param $request request with inputs
     * @return $theater_id
     */
    public function addTheaters($request)
    {
        return $this->theaterDao->addTheaters($request);
    }
}
