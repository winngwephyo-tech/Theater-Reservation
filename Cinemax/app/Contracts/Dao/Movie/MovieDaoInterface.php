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
    public function update($request, $id);
    /**
     * 
     */
    public function count_theater();
    public function get_showingMovieData();
    public function count_upcomingMovie();

    public function get_upcomingMovieData();
}