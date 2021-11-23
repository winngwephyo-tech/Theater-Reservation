<?php

namespace App\Dao\Movie;

use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Movie\MovieDescriptionDaoInterface;


class MovieDescriptionDao implements MovieDescriptionDaoInterface
{

    public function movie_details($id)
    {
        $movie = DB::table('movies')
                ->where('id' , '=' , $id)
                ->first();
        return $movie;
    }

    public function showtime($id)
    {
        $showtime = DB::table('showtimes')
                    ->where('movie_id' , '=' , $id)
                    ->get();
        return $showtime;
    }

    public function upmovie($id)
    {
        $upmovie = DB::table('upcoming_movies')
                   ->where('id' , '=' , $id)
                   ->first();
        return $upmovie;
    }

}
