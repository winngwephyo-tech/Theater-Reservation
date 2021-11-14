<?php

namespace App\Services\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Contracts\Services\Movie\MovieServiceInterface;
use App\Dao\Movie\MovieDao;


class MovieService implements MovieServiceInterface
{
    /**
     * Movie dao
     */
    private $movieDao;
    /**
     * Class Constructor
     * @param MovieDao
     * @return
     */
    public function __construct(MovieDaoInterface $movieDao)
    {
        $this->movieDao = $movieDao;
    }

    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies()
    {
       $this->movieDao->getMovies();
    }
    /**
     * 
     */
    public function store($request){
        $this->movieDao->store($request);
    }
    /**
     * 
     */
    public function update($request, $movie){
        $this->movieDao->update($request,$movie);
    }
}