<?php
namespace App\Contracts\Services;


interface UpcommingMovieServiceInterface
{
    public function count_upcomingMovie();

    public function get_upcomingMovieData();

}
