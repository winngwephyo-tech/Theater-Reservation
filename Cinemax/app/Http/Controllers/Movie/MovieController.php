<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\MovieServiceInterface;

class MovieController extends Controller
{
    private $MovieInterface;

    public function __construct(MovieServiceInterface $MovieServiceInterface)
    {
        $this->MovieInterface = $MovieServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movie.movie_list');
    }

    public function get_required_data()
    {
        $no_of_theater = $this->MovieInterface->count_theater();

        $showingMovie_result = $this->MovieInterface->get_showingMovieData();

        return view('movie.movie_list')->with(['no_of_theater'=>$no_of_theater  , 'showingMovie_result' => $showingMovie_result]);

    }


    public function RequiredData_for_ManageMovie()
    {
         $no_of_theater = $this->MovieInterface->count_theater();

         $showingMovie_result = $this->MovieInterface->get_showingMovieData();

        return view('movie.manage_movie')->with(['no_of_theater'=>$no_of_theater , 'showingMovie_result' => $showingMovie_result]);
    }

}
