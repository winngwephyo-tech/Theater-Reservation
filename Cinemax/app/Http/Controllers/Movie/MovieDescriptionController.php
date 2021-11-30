<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Movie\MovieDescriptionServiceInterface;

class MovieDescriptionController extends Controller
{
    private $MovieDescriptionInterface;

    public function __construct(MovieDescriptionServiceInterface $MovieDescriptionServiceInterface)
    {
        $this->MovieDescriptionInterface = $MovieDescriptionServiceInterface;
    }

    public function get_details($id)

    {
        $movie = $this->MovieDescriptionInterface->movie_details($id);

        $showtime = $this->MovieDescriptionInterface->showtime($id);

        $no_of_upcomingMovie = $this->MovieDescriptionInterface->count_upcomingMovie();

        $upcomingMovie_result = $this->MovieDescriptionInterface->get_upcomingMovieData();

        return view('movie.movie_description')
               ->with(['movie' => $movie,
                       'showtime' => $showtime ,
                       'no_of_upcomingMovie' => $no_of_upcomingMovie ,
                       'upcomingMovie_result' => $upcomingMovie_result]);
    }

    public function upmovie($id)
    {
        $upmovie = $this->MovieDescriptionInterface->upmovie($id);

        return view('movie.upmovie_description')->with(['upmovie'=>$upmovie]);
    }

}
