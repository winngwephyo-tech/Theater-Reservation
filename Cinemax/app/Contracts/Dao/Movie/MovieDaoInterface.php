<?php

namespace App\Contracts\Dao\Movie;

use App\Models\Showtime;
use App\Models\UpcomingMovie;

interface MovieDaoInterface
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
    public function store($request,$input);
    /**
     * Count theater id
     * for create movie
     * @return void
     */
    public function create();
    /**
     * Update Movie
     * @param array $input 
     * @param Movie $id 
     * @return Movies object
     */
    public function updateMovie($input, $id);
    /**
     * Update ShowTime
     * @param  \Illuminate\Http\Request  $request
     * @param Showtime $id 
     * @return \Illuminate\Http\Response
     * @return Showtimes object
     */
    public function updateShowTime($request, $id);
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
