<?php

namespace App\Contracts\Dao\Movie;



interface MovieDaoInterface{
     /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies();
    /**
     * Store Movie
     * User Request
     */
    public function store($request);
    /**
     * Update Movie
     */
    public function update($request, $movie);
}