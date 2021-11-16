<?php

namespace App\Contracts\Dao;


interface UpcommingMovieDaoInterface
{
    public function count_upcomingMovie();

    public function get_upcommingMovieData();

}
