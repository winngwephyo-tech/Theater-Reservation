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
     * To get all theaters
     * @return $theaters
     */
    public function getTheaters()
    {
        return $this->theaterDao->getTheaters();
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
    /**
     * To delete theater
     * @param $theater_id
     */
    public function deleteTheater($theater_id)
    {
        $this->theaterDao->deleteTheater($theater_id);
    }
}
