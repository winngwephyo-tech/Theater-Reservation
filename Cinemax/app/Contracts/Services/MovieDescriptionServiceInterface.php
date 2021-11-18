<?php

namespace App\Contracts\Services;

interface MovieDescriptionServiceInterface
{
    public function movie_details($id);

    public function showtime($id);
}
