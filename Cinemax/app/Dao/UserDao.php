<?php

namespace App\Dao;

use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\UserDaoInterface;


class UserDao implements UserDaoInterface
{
    public function count_theater()
    {
        $theater = DB::table('theaters')
                   ->count();
        return $theater;
    }

    public function get_data(){
        $value = DB::table('movies')
                 ->join('theaters' , 'movies.id' , '=' , 'theaters.id')
                 ->select('movies.title' , 'movies.duration')
                 ->get();

        return $value;
    }
}
