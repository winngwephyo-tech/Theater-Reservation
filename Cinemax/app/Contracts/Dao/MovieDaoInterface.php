<?php

namespace App\Contracts\Dao;


interface MovieDaoInterface
{
    public function count_theater();

    public function get_showingMovieData();

    public function show_movieData($poster);

}
