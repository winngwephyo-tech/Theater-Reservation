<?php

namespace App\Contracts\Dao;


interface UpcomingMovieDaoInterface
{
    public function count_upcomingMovie();

    public function get_upcomingMovieData();

}
