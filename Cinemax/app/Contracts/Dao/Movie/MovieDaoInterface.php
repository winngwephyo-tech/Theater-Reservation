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
    public function updateMovie($input,$id);
    /**
     * Update ShowTime
     */
    public function updateShowTime($request, $id);
 
    /**
     * count theater
     */
    public function count_theater();
    /**
     * get data for showing movie
     */
    public function get_showingMovieData();
    /**
     * count upcoming movie
     */
    public function count_upcomingMovie();
    /**
     * get data for upcoming movie
     */
    public function get_upcomingMovieData();
}
