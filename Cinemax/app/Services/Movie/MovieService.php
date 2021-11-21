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
     * @param request
     *Store Movie Data
     */
    public function store($request){
        $this->movieDao->store($request);
    }
    /**
     * @param request and $id
     *Update Movie Data
     */
    public function update($request, $id){
        $this->movieDao->update($request,$id);
    }
    /**
     *Count No of Theater
     */

    public function count_theater()
    {
        $theater = $this->movieDao->count_theater();
        return $theater;
    }
    /**
     *Select Data from Movies Table
     */
    public function get_showingMovieData()
    {
         return $this->movieDao->get_showingMovieData();
    }
    /**
     *Count UpComing Movie List
     */
    public function count_upcomingMovie()
    {
        return $this->movieDao->count_upcomingMovie();
    }
    /**
     *Select Data from UpComing Movies Table
     */
    public function get_upcomingMovieData()
    {
         return $this->movieDao->get_upcomingMovieData();
    }
}


