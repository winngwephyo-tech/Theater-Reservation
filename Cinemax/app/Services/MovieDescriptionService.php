<?php

namespace App\Services;

use App\Contracts\Dao\MovieDescriptionDaoInterface;
use App\Contracts\Services\MovieDescriptionServiceInterface;

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

}
