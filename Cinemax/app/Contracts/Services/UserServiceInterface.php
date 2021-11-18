<?php
namespace App\Contracts\Services;


interface UserServiceInterface
{
    public function count_theater();

    public function count_upcomingMovie();

    public function get_showingMovieData();

    public function get_upcomingMovieData();

    public function get_poster($id);

    // public function showtime();

}
