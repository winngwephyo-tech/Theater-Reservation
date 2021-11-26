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

     /**
     * count upcoming movie
     */
    public function count_upcomingMovie()
    {
        $upcomingMovie = UpcomingMovie::count();

        return $upcomingMovie;
    }
    /**
     * get upcoming movie data
     */
    public function get_upcomingMovieData()
    {
        $upcomingMovie_value = UpcomingMovie::select('id', 'title', 'duration', 'poster')
                               ->whereNull('upcoming_movies.deleted_at')
                               ->get();
        return $upcomingMovie_value;
    }

}
