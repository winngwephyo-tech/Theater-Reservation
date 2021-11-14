<?php

namespace App\Contracts\Dao\Movie;


use Illuminate\Http\Request;
use App\Http\Requests\MovieInfoRequest;

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