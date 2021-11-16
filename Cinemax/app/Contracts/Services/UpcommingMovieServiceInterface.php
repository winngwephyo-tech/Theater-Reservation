<?php
namespace App\Contracts\Services;


interface UpcomingMovieServiceInterface
{
    public function count_upcomingMovie();

    public function get_upcomingMovieData();

}
