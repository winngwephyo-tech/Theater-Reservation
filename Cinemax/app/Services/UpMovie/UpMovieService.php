<?php

namespace App\Services\UpMovie;

use App\Contracts\Dao\UpMovie\UpMovieDaoInterface;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;


class UpMovieService implements UpMovieServiceInterface
{
    /**
     * Movie dao
     */
    private $upmovieDao;
    /**
     * Class Constructor
     * @param MovieDao
     * @return
     */
    public function __construct(UpMovieDaoInterface $upmovieDao)
    {
        $this->upmovieDao = $upmovieDao;
    }

    /**
     * To get Movies
     * @return $Movies
     */
    public function getUpMovies()
    {
       $this->upmovieDao->getUpMovies();
    }
    /**
     * 
     */
    public function store($request){
        $this->upmovieDao->store($request);
    }
    /**
     * 
     */
    public function update($request, $movie){
        $this->upmovieDao->update($request,$movie);
    }
}

