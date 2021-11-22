<?php

namespace App\Contracts\Services\Movie;

interface MovieServiceInterface
{
    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies();
    /**
     * Store Movies
     */
    public function store($request);
    /**
     * Update Movie
     */
    public function update($request, $id);
    /**
     * Count Number of theater
     */
    public function count_theater();
    /**
     * Read all data from Movies table
     */
    public function get_showingMovieData();
    /**
     * Count Number of Movie
     */
    public function count_upcomingMovie();
    /**
     * Read all data from UpMovies table
     */
    public function get_upcomingMovieData();
}
