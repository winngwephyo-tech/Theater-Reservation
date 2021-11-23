<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieInfoRequest;
use App\Contracts\Services\Movie\MovieServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
  private $movieInterface;

  public function __construct(MovieServiceInterface $MovieServiceInterface)
  {
    $this->movieInterface = $MovieServiceInterface;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   * User View
   */
  public function get_required_data()
  {
    $no_of_theater = $this->movieInterface->count_theater();

    $showingMovie_result = $this->movieInterface->get_showingMovieData();

    $no_of_upcomingMovie = $this->movieInterface->count_upcomingMovie();

    $upcomingMovie_result = $this->movieInterface->get_upcomingMovieData();

    return view('movie.movie_list')->with(['no_of_theater' => $no_of_theater, 'showingMovie_result' => $showingMovie_result, 'no_of_upcomingMovie' => $no_of_upcomingMovie, 'upcomingMovie_result' => $upcomingMovie_result]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Respons
   * Admin View
   */

  public function RequiredData_for_ManageMovie()
  {
    $no_of_theater = $this->movieInterface->count_theater();
    $showingMovie_result = $this->movieInterface->get_showingMovieData();
    $no_of_upcomingMovie = $this->movieInterface->count_upcomingMovie();
    $upcomingMovie_result = $this->movieInterface->get_upcomingMovieData();
    return view('movie.manage_movie')->with(['no_of_theater' => $no_of_theater, 'showingMovie_result' => $showingMovie_result, 'no_of_upcomingMovie' => $no_of_upcomingMovie, 'upcomingMovie_result' => $upcomingMovie_result]);
  }


  public function create()
  {
    $theaters=$this->movieInterface->create();
     return view('movie.create_movie',compact('theaters'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MovieInfoRequest $request)
  {
    $this->movieInterface->store($request);
    return redirect()->route('admin_movie')
      ->with('success', 'Movie created successfully.');
  }
  /**
   * Edit Movie By movie Id
   * @param $id
   */

  public function edit($id)
  {
    $movie = DB::table('movies')
      ->where('id', '=', $id)
      ->select('*')
      ->first();

    $showtime = DB::table('showtimes')
      ->where('movie_id', '=', $id)
      ->select('*')
      ->get();
      $theaters=$this->movieInterface->create();
    return view('movie.edit_movie', compact('movie', 'showtime','theaters'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(MovieInfoRequest $request, $id)
  {
    $this->movieInterface->update($request, $id);
    return redirect()->route('admin_movie')
      ->with('success', 'Movie updated successfully');
  }
}
