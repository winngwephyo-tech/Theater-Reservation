<?php

namespace App\Dao;

use App\Models\Movie;
use App\Models\Showtime;
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

    public function get_showingMovieData()
    {
         $showingMovie_value = DB::table('movies')
                               ->select('id' ,'theater_id' , 'title' , 'duration' ,'poster')
                               ->get();

         return $showingMovie_value;
    }

    public function get_upcomingMovieData()
    {
         $upcomingMovie_value = DB::table('upcoming_movies')
                                ->select('id' , 'title' , 'duration' , 'poster')
                                ->get();
        return $upcomingMovie_value;
    }

    public function get_poster($id)
    {
        $data = Movie::where('id' , '=' , $id)->get();

        return $data;
    }

//     public function showtime()
//     {
//         $showtime = Showtime::get();

//         return $showtime;
//     }
}
