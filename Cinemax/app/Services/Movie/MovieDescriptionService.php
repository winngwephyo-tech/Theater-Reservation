<?php

namespace App\Services\Movie;

use App\Contracts\Dao\Movie\MovieDescriptionDaoInterface;
use App\Contracts\Services\Movie\MovieDescriptionServiceInterface;

class MovieDescriptionService implements MovieDescriptionServiceInterface
{
    private $MovieDescriptionDao;

    public function __construct(MovieDescriptionDaoInterface $MovieDescriptionDaoInterface)
    {
        $this->MovieDescriptionDao = $MovieDescriptionDaoInterface;
    }

    public function movie_details($id)
    {
         return $this->MovieDescriptionDao->movie_details($id);
    }

    public function showtime($id)
    {
         return $this->MovieDescriptionDao->showtime($id);
    }

    public function upmovie($id)
    {
        return $this->MovieDescriptionDao->upmovie($id);
    }

}
