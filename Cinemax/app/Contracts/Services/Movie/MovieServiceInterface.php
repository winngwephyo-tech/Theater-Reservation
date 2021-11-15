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
    public function update($request, $movie);
}