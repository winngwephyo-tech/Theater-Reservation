<?php

namespace App\Services;

use App\Contracts\Dao\MovieDaoInterface;
use App\Contracts\Services\MovieServiceInterface;

class MovieService implements MovieServiceInterface
{
    private $MovieDao;

    public function __construct(MovieDaoInterface $MovieDao)
    {
        $this->MovieDao = $MovieDao;
    }


    public function count_theater()
    {
        $theater = $this->MovieDao->count_theater();
        return $theater;
    }

    public function get_showingMovieData()
    {
         return $this->MovieDao->get_showingMovieData();
    }

    public function show_movieData($poster)
    {
        return $this->MovieDao->show_movieData($poster);
    }

}
