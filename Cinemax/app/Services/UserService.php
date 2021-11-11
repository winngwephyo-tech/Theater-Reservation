<?php

namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $UserDao;

    public function __construct(UserDaoInterface $UserDao)
    {
        $this->UserDao = $UserDao;
    }

    public function count_theater()
    {
        return $this->UserDao->count_theater();
    }

    public function count_upcomingMovie()
    {
        return $this->UserDao->count_upcomingMovie();
    }

    public function get_showingMovieData()
    {
        return $this->UserDao->get_showingMovieData();
    }

    public function get_upcomingMovieData()
    {
        return $this->UserDao->get_upcomingMovieData();
    }
}
