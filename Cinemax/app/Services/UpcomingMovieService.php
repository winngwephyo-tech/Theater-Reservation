<?php

namespace App\Services;

use App\Contracts\Dao\UpcomingMovieDaoInterface;
use App\Contracts\Services\UpcomingMovieServiceInterface;


class UpcomingMovieService implements UpcomingMovieServiceInterface
{
    private $UpcomingMovieDao;


    public function __construct(UpcomingMovieDaoInterface $UpcomingMovieDao)
    {
        $this->UpcomingMovieDao = $UpcomingMovieDao;
    }

     public function count_upcomingMovie()
    {
        return $this->UpcomingMovieDao->count_upcomingMovie();
    }

    public function get_upcomingMovieData()
    {
         return $this->UpcomingMovieDao->get_upcomingMovieData();
    }
}


