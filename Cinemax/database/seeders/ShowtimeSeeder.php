<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Showtime;
use Illuminate\Support\Facades\DB;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showtimes')->delete();
        $data = [
            ['movie_id'=>1, 'theater_id'=>1, 'showtime'=> '34',],
            ['movie_id'=>1, 'theater_id'=>1, 'showtime'=> '44',],
        ];
        foreach($data as $data){
            Showtime::insert($data);
        }
    }
}
