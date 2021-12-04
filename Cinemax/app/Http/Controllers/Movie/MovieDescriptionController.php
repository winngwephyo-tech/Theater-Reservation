<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Movie\MovieDescriptionServiceInterface;
use App\Models\UpcomingMovie;

class MovieDescriptionController extends Controller
{
    /**
     * MovieDescriptionServiceInterface
     */
    private $MovieDescriptionInterface;
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(MovieDescriptionServiceInterface $MovieDescriptionServiceInterface)
    {
        $this->MovieDescriptionInterface = $MovieDescriptionServiceInterface;
    }
    /**
     * @param Movie $id
     * @return view with \Illuminate\Http\Response
     */
    public function get_details($id)
    {
        $movie = $this->MovieDescriptionInterface->movie_details($id);
        $theater_name = $this->MovieDescriptionInterface->theater_name($id);
        $showtime = $this->MovieDescriptionInterface->showtime($id);
        $no_of_upcomingMovie = $this->MovieDescriptionInterface->count_upcomingMovie();
        $upcomingMovie_result = $this->MovieDescriptionInterface->get_upcomingMovieData();
        return view('movie.detail')
            ->with([
                'movie' => $movie,
                'theater_name' => $theater_name,
                'showtime' => $showtime,
                'no_of_upcomingMovie' => $no_of_upcomingMovie,
                'upcomingMovie_result' => $upcomingMovie_result
            ]);
    }
    /**
     * @param UpcomingMovie $id
     * @return view with \Illuminate\Http\Response
     */
    public function upmovie($id)
    {
        $upmovie = $this->MovieDescriptionInterface->upmovie($id);
        return view('movie.upmovie_detail')->with(['upmovie' => $upmovie]);
    }
}
