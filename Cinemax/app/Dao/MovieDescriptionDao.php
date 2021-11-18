<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\MovieDescriptionDaoInterface;


class MovieDescriptionDao implements MovieDescriptionDaoInterface
{

    public function movie_details($id)
    {
        $movie = DB::table('movies')
                ->where('id' , '=' , $id)
                ->first();
        return $movie;
    }

    public function showtime($id)
    {
        $showtime = DB::table('showtimes')
                    ->where('movie_id' , '=' , $id)
                    ->get();
        return $showtime;
    }

}
