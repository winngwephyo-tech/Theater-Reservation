<?php

namespace App\Contracts\Dao;

interface MovieDescriptionDaoInterface
{
    public function movie_details($id);

    public function showtime($id);
}
