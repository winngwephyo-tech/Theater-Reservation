<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\UpcomingMovieDaoInterface;


class UpcomingMovieDao implements UpcomingMovieDaoInterface
{

public function count_upcomingMovie()
    {
         $upcomingMovie = DB::table('upcoming_movies')
                          ->count();

         return $upcomingMovie;
    }

    public function get_upcomingMovieData()
    {
         $upcomingMovie_value = DB::table('upcoming_movies')
                                ->select('id' , 'title' , 'duration' , 'poster')
                                ->get();
        return $upcomingMovie_value;
    }
}
