<?php

namespace App\Contracts\Services\Movie;

use App\Models\Movie;

interface MovieServiceInterface
{
    /**
     * To get Movies
     * @return object $movies
     */
    public function getMovies();
    /**
     * Store Movie
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request);
    /**
     * Count theater id
     * for create movie
     * @return void
     */
    public function create();
    /**
     * Update Movie
     * @param  \Illuminate\Http\Request  $request
     * @param Movie $id 
     * @return \Illuminate\Http\Response
     * @return object Movies
     */
    public function update($request, $id);
    /**
     * count theater
     * @return no of theater
     */
    public function count_theater();
    /**
     * get data for showing movie
     * @return object of Movies 
     */
    public function get_showingMovieData();
    /**
     * count upcoming movie
     * @return no of upcoming movies
     */
    public function count_upcomingMovie();
    /**
     * get data for upcoming movie
     * @return object of  UpcomingMovies
     */
    public function get_upcomingMovieData();
}
