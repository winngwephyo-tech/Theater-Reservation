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
    public function update($request, $movie,$showtime){
        $this->movieDao->update($request,$movie,$showtime);
    }

    public function count_theater()
    {
        $theater = $this->movieDao->count_theater();
        return $theater;
    }

    public function get_showingMovieData()
    {
         return $this->movieDao->get_showingMovieData();
    }

    public function count_upcomingMovie()
    {
        return $this->movieDao->count_upcomingMovie();
    }

    public function get_upcomingMovieData()
    {
         return $this->movieDao->get_upcomingMovieData();
    }
}


