<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('movies')->delete();
        $data = [
            ['theater_id'=>1, 'genre'=> 'Action', 'title'=> 'Venom', 'poster'=> 'blob',
             'details'=> 'details', 'rating'=> 4.4, 'trailer'=> 'trailer','duration'=> 125,'cast'=> 'cast'],
             ['theater_id'=>2, 'genre'=> 'Action', 'title'=> 'The Eternals', 'poster'=> 'poster',
              'details'=> 'Marvel Movie', 'rating'=> 3.4, 'trailer'=> 'trailer link','duration'=> 145,'cast'=> 'casts'],
        ];
        foreach($data as $data){
            Movie::insert($data);
        }
    }
}
