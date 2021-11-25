<?php

namespace App\Contracts\Services\Movie;

interface MovieDescriptionServiceInterface
{
    public function movie_details($id);

    public function showtime($id);

    public function upmovie($id);

    /**
     * Count Number of Movie
     */
    public function count_upcomingMovie();
    /**
     * Read all data from UpMovies table
     */
    public function get_upcomingMovieData();
}
