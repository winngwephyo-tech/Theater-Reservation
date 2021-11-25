<?php

namespace App\Contracts\Dao\Movie;

interface MovieDescriptionDaoInterface
{
    public function movie_details($id);

    public function showtime($id);

    public function upmovie($id);

    /**
     * count upcoming movie
     */
    public function count_upcomingMovie();
    /**
     * get data for upcoming movie
     */
    public function get_upcomingMovieData();
}
