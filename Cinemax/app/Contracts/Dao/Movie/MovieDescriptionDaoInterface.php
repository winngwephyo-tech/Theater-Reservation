<?php

namespace App\Contracts\Dao\Movie;

interface MovieDescriptionDaoInterface
{
    public function movie_details($id);

    public function showtime($id);
}
