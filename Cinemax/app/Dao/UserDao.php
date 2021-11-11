<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\UserDaoInterface;


class UserDao implements UserDaoInterface
{
    public function count_theater()
    {
        $theater = DB::table('theaters')
                   ->count();
        return $theater;
    }

    public function count_upcomingMovie()
    {
        $upcomingMovie = DB::table('upcoming_movies')
                         ->count();

        return $upcomingMovie;
    }

    public function get_showingMovieData(){
        $showingMovie_value = DB::table('movies')
                              ->select('title' , 'duration')
                              ->get();

        return $showingMovie_value;
    }

    public function get_upcomingMovieData()
    {
        $upcomingMovie_value = DB::table('upcoming_movies')
                               ->select('title' , 'duration')
                               ->orderBy('id')
                               ->get();
        return $upcomingMovie_value;
    }
}
