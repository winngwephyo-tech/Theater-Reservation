<?php

namespace App\Dao\Movie;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\UpcomingMovie;
use App\Contracts\Dao\Movie\MovieDescriptionDaoInterface;

class MovieDescriptionDao implements MovieDescriptionDaoInterface
{

    public function movie_details($id)
    {
        $movie = Movie::where('id' , '=' , $id)
                ->first();
        return $movie;
    }

    public function showtime($id)
    {
        $showtime = Showtime::where('movie_id' , '=' , $id)
                    ->get();

        return $showtime;
    }

    public function upmovie($id)
    {
        $upmovie = UpcomingMovie::where('id' , '=' , $id)
                   ->first();
        return $upmovie;
    }

}
