<?php

namespace App\Http\Controllers\UpcommingMovie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\UpcommingMovieServiceInterface;

class UpcommingMovieController extends Controller
{
    private $UpcommingMovieInterface;

    public function __construct(UpcommingMovieServiceInterface $UpcommingMovieServiceInterface)
    {
        $this->UpcommingMovieInterface = $UpcommingMovieServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upcomming_movie.upcomming_movie_list');
    }

    public function get_required_data()
    {

        $no_of_upcomingMovie = $this->UpcommingMovieInterface->count_upcomingMovie();

        $upcomingMovie_result = $this->UpcommingMovieInterface->get_upcomingMovieData();

        return view('upcomming_movie.upcomming_movie_list')->with(['no_of_upcomingMovie'=>$no_of_upcomingMovie , 'upcomingMovie_result'=>$upcomingMovie_result]);

    }

    public function RequiredData_for_ManageMovie()
    {

         $no_of_upcomingMovie = $this->UpcommingMovieInterface->count_upcomingMovie();

         $upcomingMovie_result = $this->UpcommingMovieInterface->get_upcomingMovieData();

        return view('upcomming_movie.manage_upcommingMovie')->with(['no_of_upcomingMovie'=>$no_of_upcomingMovie , 'upcomingMovie_result'=>$upcomingMovie_result]);
    }


}
