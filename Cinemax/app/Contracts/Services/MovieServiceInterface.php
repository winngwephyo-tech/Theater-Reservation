<?php
namespace App\Contracts\Services;


interface MovieServiceInterface
{
    public function count_theater();

    public function get_showingMovieData();

    public function show_movieData($poster);

}
