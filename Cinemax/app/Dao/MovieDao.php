<?php

namespace App\Dao;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\MovieDaoInterface;


class MovieDao implements MovieDaoInterface
{


    public function count_theater()
    {
        $theater = DB::table('theaters')
               ->count();
        return $theater;
    }

    public function get_showingMovieData()
    {
         $showingMovie_value = DB::table('movies')
                               ->select('theater_id' , 'title' , 'duration' ,'poster')
                               ->get();

         return $showingMovie_value;
    }
}
