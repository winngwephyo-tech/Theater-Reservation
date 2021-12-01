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
     * @param TheaterDaoInterface $theaterDao
     * @return void
     */
    public function __construct(TheaterDaoInterface $theaterDao)
    {
        $this->theaterDao = $theaterDao;
    }
    /**
     * To add theater
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTheaters($request)
    {
        return $this->theaterDao->addTheaters($request);
    }
    /**
     * To delete theater
     * @param Theater $theater_id
     * @return \Illuminate\Http\Response
     */
    public function deleteTheater($theater_id)
    {
        return $this->theaterDao->deleteTheater($theater_id);
    }
}
