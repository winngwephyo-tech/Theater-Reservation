<?php

namespace App\Dao\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Theater;
use Illuminate\Support\Facades\DB;

class MovieDao implements MovieDaoInterface
{
    /**
     * To get Movies
     * @return $Movies
     */
    public function getMovies()
    {
        $movie = Movie::latest()->paginate(5);
        return $movie;
    }
    /**
     * Select Theater id
     */
    public function create(){
        $theater=Theater::select('id')->get();
        return $theater;

    }
    /**
     * Add new Movie
     * @param $request
     */
    public function store($request)
    {
        $request->validate([
              'poster' => 'required',
        ]);

        $input = [
            'theater_id' =>  $request->theater_id, 'genre' =>  $request->genre, 'title' =>  $request->title,
            'details' =>  $request->details, 'rating' =>  $request->rating, 'trailer' =>  $request->trailer, 'duration' =>  $request->duration,
            'cast' =>  $request->cast
        ];
        if ($poster = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            $poster->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        }

        $movieid = Movie::create($input)->id;

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
            $data = ['movie_id' => $movieid, 'theater_id' => $request->theater_id, 'showtime' => $showtime];
            Showtime::create($data);
        }
    }
    /**
     * Update Movie
     * @param $input ,$id
     * @param movie
     */
    public function updateMovie($input, $id)
    { 
        Movie::where('id', '=', $id)->update($input);
    }
    /**
     * Update ShowTime
     * @param $request,$id
     */
    public function updateShowTime($request, $id)
    {
        //For Show Times
        $showtimes = Showtime::select('showtimes.id')
            ->where('movie_id', '=', $id)
            ->get();
        $data = ['showtime' =>  $request->time1];
        Showtime::where('id', '=', $showtimes[0]->id)->update($data);
        $data = ['showtime' =>  $request->time2];
        Showtime::where('id', '=',  $showtimes[1]->id)->update($data);
        $data = ['showtime' =>  $request->time3];
        Showtime::where('id', '=', $showtimes[2]->id)->update($data);
    }
    /**
     * count theater
     */
    public function count_theater()
    {
        $theater = DB::table('theaters')
            ->count();
        return $theater;
    }
    /**
     * get movie data
     */
    public function get_showingMovieData()
    {
        $showingMovie_value = DB::table('movies')
            ->select('theater_id', 'title', 'duration', 'poster', 'id')
            ->get();

        return $showingMovie_value;
    }
    /**
     * count upcoming movie
     */
    public function count_upcomingMovie()
    {
        $upcomingMovie = DB::table('upcoming_movies')
            ->count();

        return $upcomingMovie;
    }
    /**
     * get upcoming movie data
     */
    public function get_upcomingMovieData()
    {
        $upcomingMovie_value = DB::table('upcoming_movies')
            ->select('id', 'title', 'duration', 'poster')
            ->whereNull('upcoming_movies.deleted_at')
            ->get();
        return $upcomingMovie_value;
    }
}
