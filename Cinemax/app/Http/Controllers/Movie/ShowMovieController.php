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

    }


    public function RequiredData_for_ManageMovie()
    {
         $no_of_theater = $this->UserInterface->count_theater();

         $no_of_upcomingMovie = $this->UserInterface->count_upcomingMovie();

         $showingMovie_result = $this->UserInterface->get_showingMovieData();

         $upcomingMovie_result = $this->UserInterface->get_upcomingMovieData();

        return view('movie.manage_movie')->with(['no_of_theater'=>$no_of_theater  , 'no_of_upcomingMovie'=>$no_of_upcomingMovie , 'showingMovie_result' => $showingMovie_result , 'upcomingMovie_result'=>$upcomingMovie_result]);
    }

    // public function booking()
    // {
    //     $data = $this->UserInterface->get_poster('id');

    //     // $showtime = $this->UserInterface->showtime();

    //     //return $data;

    //     return $data;

    //     return view('movie.movie_description')->with(['data'=>$data]);
    // }

    public function get_details($id)
    {
        $movie = DB::table('movies')
                ->where('id' , '=' , $id)
                ->first();
        //dd($movie);

        $showtime = DB::table('showtimes')
                    ->where('movie_id' , '=' , $id)
                    ->get();
        //dd($showtime);

        // $data = DB::table('movies')
        //         ->join('showtimes' , 'movies.id' ,'=' , 'showtimes.movie_id')
        //         ->select('movies.*' , 'showtimes.id'  , 'showtimes.showtime')
        //         ->get();

        // //dd($data);



        return view('movie.movie_description')->with(['movie'=>$movie , 'showtime'=>$showtime]);
    }



}

