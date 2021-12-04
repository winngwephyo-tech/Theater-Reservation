<?php

namespace App\Contracts\Dao\Movie;

use App\Models\Movie;
use App\Models\Showtime;
use App\Models\UpcomingMovie;

interface MovieDescriptionDaoInterface
{
    /**
     * @param Movie $id
     * @return object of  movies
     */
    public function movie_details($id);
     /**
     * @param Movie $id
     * @return Object Theater
     */
    public function theater_name($id);
    /**
     * @param Showtime $id
     * @return object of Showtimes
     */
    public function showtime($id);
    /**
     * @param UpcomingMovie $id
     * @return object of UpcomingMovie
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
