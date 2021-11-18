<?php

namespace App\Contracts\Services\Movie;

interface MovieServiceInterface{
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

    public function count_theater();

    public function get_showingMovieData();
    public function count_upcomingMovie();

    public function get_upcomingMovieData();



}