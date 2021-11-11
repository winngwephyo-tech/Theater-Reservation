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

    public function get_data()
    {
        return $this->UsserDao->get_data();
    }
}
