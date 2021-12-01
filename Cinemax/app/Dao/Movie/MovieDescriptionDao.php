<?php

namespace App\Dao\Movie;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\UpcomingMovie;
use App\Contracts\Dao\Movie\MovieDescriptionDaoInterface;

class MovieDescriptionDao implements MovieDescriptionDaoInterface
{
    /**
     * @param Movie $id
     * @return object of $movies
     */
    public function movie_details($id)
    {
        return  Movie::where('id', '=', $id)->first();
    }
    /**
     * @param int $id
     * @return object of $showtimes
     */
    public function showtime($id)
    {
        return  Showtime::where('movie_id', '=', $id)->get();
    }

    /**
     * @param int $id
     * @return object of $upcomingmovies
     */
    public function upmovie($id)
    {
        return  UpcomingMovie::where('id', '=', $id)->first();
    }
    /**
     * count upcoming movie
     * @return no of upcomingmocies
     */
    public function count_upcomingMovie()
    {
        return UpcomingMovie::count();
    }
    /**
     * get upcoming movie data
     * @return object of upcomingmovies
     */
    public function get_upcomingMovieData()
    {
        return  UpcomingMovie::select('id', 'title', 'duration', 'poster')
            ->whereNull('upcoming_movies.deleted_at')
            ->get();
    }
}
