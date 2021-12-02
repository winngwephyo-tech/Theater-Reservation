<?php

namespace App\Dao\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Theater;
use App\Models\UpcomingMovie;
use Illuminate\Support\Facades\DB;

class MovieDao implements MovieDaoInterface
{
    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies()
    {
        return Movie::latest()->paginate(5);
    }
    /**
     * Select Theater id
     * @return Theater id 
     */
    public function create()
    {
        return Theater::select('id')->get();
    }
    /**
     * Add new Movie
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request, $input)
    {
        $movieid =   DB::transaction(function () use ($input) {
            return $movieid =    Movie::create($input)->id;
        });

        // For ShowTime Table
        for ($i = 0; $i < 3; $i++) {
            switch ($i) {
                case 0:
                    $showtime = $request->time1;
                    break;
                case 1:
                    $showtime = $request->time2;
                    break;
                case 2:
                    $showtime = $request->time3;
                    break;
            }

            $data = [
                'movie_id' => $movieid,
                'theater_id' => $request->theater_id,
                'showtime' => $showtime
            ];

            DB::transaction(function () use ($data) {
                Showtime::create($data);
            });
        }
    }
    /**
     * Update Movie
     * @param array $input
     * @param Movie $id
     * @return \Illuminate\Http\\Response
     */
    public function updateMovie($input, $id)
    {
        return DB::transaction(function () use ($input, $id) {
            Movie::where('id', '=', $id)->update($input);
        });
    }
    /**
     * Update ShowTime
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\\Response
     * @param Showtime $id
     */
    public function updateShowTime($request, $id)
    {
        //For Show Times
        $showtimes = Showtime::select('showtimes.id')
            ->where('movie_id', '=', $id)
            ->get();
        $data = ['showtime' =>  $request->time1];
        DB::transaction(function () use ($data, $showtimes) {
            Showtime::where('id', '=', $showtimes[0]->id)->update($data);
        });
        $data = ['showtime' =>  $request->time2];
        DB::transaction(function () use ($data, $showtimes) {
            Showtime::where('id', '=',  $showtimes[1]->id)->update($data);
        });

        $data = ['showtime' =>  $request->time3];
        DB::transaction(function () use ($data, $showtimes) {
            Showtime::where('id', '=', $showtimes[2]->id)->update($data);
        });
    }
    /**
     * count theater
     * @return no of theater
     */
    public function count_theater()
    {
        return Theater::count();
    }
    /**
     * get movie data
     * @return object of $movies
     */
    public function get_showingMovieData()
    {
        return  Movie::select('theater_id', 'title', 'duration', 'poster', 'id')
            ->get();
    }
    /**
     * count upcoming movie
     * @return no of upcomingmovies
     */
    public function count_upcomingMovie()
    {
        return  UpcomingMovie::count();
    }
    /**
     * get upcoming movie data
     * @return object of $upcomingmovies
     */
    public function get_upcomingMovieData()
    {
        return  UpcomingMovie::select('id', 'title', 'duration', 'poster')
            ->whereNull('upcoming_movies.deleted_at')
            ->get();
    }
}
