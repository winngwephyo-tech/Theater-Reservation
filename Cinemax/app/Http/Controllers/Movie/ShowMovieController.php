<?php

namespace App\Http\Controllers\Movie;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Contracts\Services\UserServiceInterface;

class ShowMovieController extends Controller
{
    private $UserInterface;

    public function __construct(UserServiceInterface $UserServiceInterface)
    {
        $this->UserInterface = $UserServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_required_data()
    {
        $no_of_theater = $this->UserInterface->count_theater();

        $no_of_upcomingMovie = $this->UserInterface->count_upcomingMovie();

        $showingMovie_result = $this->UserInterface->get_showingMovieData();

        $upcomingMovie_result = $this->UserInterface->get_upcomingMovieData();

        return view('movie.movieList')->with(['no_of_theater'=>$no_of_theater  , 'no_of_upcomingMovie'=>$no_of_upcomingMovie , 'showingMovie_result' => $showingMovie_result , 'upcomingMovie_result'=>$upcomingMovie_result]);

        return view('movie.movie_description')->with(['no_of_theater'=>$no_of_theater  , 'no_of_upcomingMovie'=>$no_of_upcomingMovie , 'showingMovie_result' => $showingMovie_result , 'upcomingMovie_result'=>$upcomingMovie_result]);

    }


    public function RequiredData_for_ManageMovie()
    {
         $no_of_theater = $this->UserInterface->count_theater();

         $no_of_upcomingMovie = $this->UserInterface->count_upcomingMovie();

         $showingMovie_result = $this->UserInterface->get_showingMovieData();

         $upcomingMovie_result = $this->UserInterface->get_upcomingMovieData();

        return view('movie.manage_movie')->with(['no_of_theater'=>$no_of_theater  , 'no_of_upcomingMovie'=>$no_of_upcomingMovie , 'showingMovie_result' => $showingMovie_result , 'upcomingMovie_result'=>$upcomingMovie_result]);
    }

    public function get_details($id)
    {
        $movie = $this->UserInterface->movie_details($id);

        $showtime = $this->UserInterface->showtime($id);

        return view('movie.movie_description')->with(['movie'=>$movie , 'showtime'=>$showtime]);
    }


}

