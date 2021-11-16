<?php

namespace App\Services;

use App\Contracts\Dao\UpcommingMovieDaoInterface;
use App\Contracts\Services\UpcommingMovieServiceInterface;


class UpcommingMovieService implements UpcommingMovieServiceInterface
{
    private $UpcommingMovieDao;


    public function __construct(UpcommingMovieDaoInterface $UpcommingMovieDao)
    {
        $this->UpcommingMovieDao = $UpcommingMovieDao;
    }

     public function count_upcomingMovie()
    {
        return $this->UpcommingMovieDao->count_upcomingMovie();
    }

    public function get_upcomingMovieData()
    {
         return $this->UpcommingMovieDao->get_upcommingMovieData();
    }
}


