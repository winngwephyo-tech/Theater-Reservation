<?php

namespace App\Http\Controllers\UpcomingMovie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\UpcomingMovieServiceInterface;

class UpcomingMovieController extends Controller
{
    private $UpcomingMovieInterface;

    public function __construct(UpcomingMovieServiceInterface $UpcomingMovieServiceInterface)
    {
        $this->UpcomingMovieInterface = $UpcomingMovieServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upcoming_movie.upcoming_movie_list');
    }

    public function upcomingMovie()
    {

        $no_of_upcomingMovie = $this->UpcomingMovieInterface->count_upcomingMovie();

        $upcomingMovie_result = $this->UpcomingMovieInterface->get_upcomingMovieData();

        return view('upcoming_movie.upcoming_movie_list')->with(['no_of_upcomingMovie'=>$no_of_upcomingMovie , 'upcomingMovie_result'=>$upcomingMovie_result]);

    }

    public function manage_upcomingMovie()
    {

         $no_of_upcomingMovie = $this->UpcomingMovieInterface->count_upcomingMovie();

         $upcomingMovie_result = $this->UpcomingMovieInterface->get_upcomingMovieData();

        return view('upcoming_movie.manage_upcomingMovie')->with(['no_of_upcomingMovie'=>$no_of_upcomingMovie , 'upcomingMovie_result'=>$upcomingMovie_result]);
    }


}
