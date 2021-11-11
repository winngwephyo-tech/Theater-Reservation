<?php

namespace App\Http\Controllers\Movie;

use App\Models\Movie;
use Illuminate\Http\Request;
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
    public function index()
    {
        return view('movie.movieList');
    }

    public function count_theater()
    {
        $theater =$this->UserInterface->count_theater();

        return view('movie.movieList' , compact('theater'));

    }

    public function count_upcomingMovie()
    {
        $upcomingMovie = $this->UserInterface->count_upcomingMovie();

        return view('movie.movieList' , compact('upcomingMovie'));
    }

    public function get_showingMovieData()
    {
        $showingMovie_result = $this->UserInterface->get_showingMovieData();
        return view('movie.movieList' , compact('showingMovie_result'));
    }

    public function get_upcomingMovieData()
    {
        $upcomingMovie_result = $this->UserInterface->get_upcomingMovieData();
        return view('movie.movieList' , compact('upcomingMovie_result'));
    }

    // public function fetch_img($id)
    // {
    //     $movie = Movie::findOrFail($id);

    //     $movie_file = Image::make($movie->form_name);

    //     $response = Response::make($movie_file->encode('jpeg'));

    //     $response->header('Content-Type', 'movie/jpeg');

    //     return $response;
    // }
}

