<?php

namespace App\Dao\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Models\Movie;
use App\Models\Showtime;

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
    public function update($request, $movie, $showtime)
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
       //dd( $input['poster']);

        $input = [
            'theater_id' => $theater_id, 'genre' => $genre, 'title' => $title, 'poster' =>$input['poster'],
            'details' => $details, 'rating' => $rating, 'trailer' => $trailer, 'duration' => $duration, 'cast' => $cast
        ];
        $movie->update($input);
        $movieid=$movie->id;

        // For ShowTime Table
         for ($i = 0; $i < 3; $i++) {
            switch ($i) {
                case 0:
                    $time = $request->time1;
                    break;
                case 1:
                    $time = $request->time2;
                    break;
                case 2:
                    $time = $request->time3;
                    break;
            }
            $data = ['movie_id' => $movieid, 'theater_id' => $theater_id, 'showtime' => $time];
            //Showtime::create($data);
            $showtime->update($data);
        }

    }
}
