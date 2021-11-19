<?php

namespace App\Dao\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Models\Movie;
use App\Models\Showtime;
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
     * Add new Movie
     * @param $request
     */
    public function store($request)
    {
        $title = $request->title;
        $duration = $request->duration;
        $theater_id = $request->theater_id;
        $details = $request->details;
        $trailer = $request->trailer;
        $genre = $request->genre;
        $rating = $request->rating;
        $cast = $request->cast;
        if ($poster = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            $poster->move($destinationPath, $profileImage);
            $input_img['poster'] = "$profileImage";
        } else {
            unset($input_img['poster']);
        }

        $input = [
            'theater_id' => $theater_id, 'genre' => $genre, 'title' => $title, 'poster' => $input_img['poster'],
            'details' => $details, 'rating' => $rating, 'trailer' => $trailer, 'duration' => $duration, 'cast' => $cast
        ];
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
            $data = ['movie_id' => $movieid, 'theater_id' => $theater_id, 'showtime' => $showtime];
            Showtime::create($data);
        }
    }
    /**
     * Update Movie
     * @request
     * @param movie
     */
    public function update($request, $id)
    {
        $title = $request->title;
        $duration = $request->duration;
        $theater_id = $request->theater_id;
        $details = $request->details;
        $trailer = $request->trailer;
        $genre = $request->genre;
        $rating = $request->rating;
        $cast = $request->cast;
        if ($poster = $request->file('poster')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $poster->getClientOriginalExtension();
            $poster->move($destinationPath, $profileImage);
            $input['poster'] = "$profileImage";
        } else {
            unset($input['poster']);
        }

        $input = [
            'theater_id' => $theater_id, 'genre' => $genre, 'title' => $title, 'poster' => $input['poster'],
            'details' => $details, 'rating' => $rating, 'trailer' => $trailer, 'duration' => $duration, 'cast' => $cast
        ];
        Movie::where('id', '=', $id)->update($input);

        // For ShowTime Table
        for ($i = 0; $i < 3; $i++) {
            if ($i == 0) {
                $time = $request->time1;
                $data = ['movie_id' => $id, 'theater_id' => $theater_id, 'showtime' => $time];
                Showtime::where('movie_id', '=', $id)->update($data);
            } elseif ($i == 1) {
                $time = $request->time2;
                $data = ['movie_id' => $id, 'theater_id' => $theater_id, 'showtime' => $time];
                Showtime::where('movie_id', '=', $id)->update($data);
            } elseif ($i == 2) {
                $time = $request->time3;
                $data = ['movie_id' => $id, 'theater_id' => $theater_id, 'showtime' => $time];
                Showtime::where('movie_id', '=', $id)->update($data);
            }
        }
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
