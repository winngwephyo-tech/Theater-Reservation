<?php

namespace App\Contracts\Services\Movie;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\UpcomingMovie;

interface MovieDescriptionServiceInterface
{
    /**
     * @param Movie $id
     * @return Movies movies
     */
    public function movie_details($id);
    /**
     * @param Showtime $id
     * @return Showtimes showtimes
     */
    public function showtime($id);
    /**
     * @param UpcomingMovie $id
     * @return UpcomingMovie upcomingmovie
     */
    public function upmovie($id);
    /**
     * count upcoming movie
     * @return no of upcoming movie list
     */
    public function count_upcomingMovie();
    /**
     * get data for upcoming movie
     * @return Object UpcomingMovie 
     */
    public function get_upcomingMovieData();
}
