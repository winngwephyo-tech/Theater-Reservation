<?php

namespace App\Contracts\Services\Movie;

interface MovieDescriptionServiceInterface
{
    public function movie_details($id);

    public function showtime($id);

    public function upmovie($id);
}
