<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieInfoRequest;
use App\Models\Movie;
use App\Contracts\Services\Movie\MovieServiceInterface;
use App\Models\Showtime;

class MovieController extends Controller
{
  private $movieInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(MovieServiceInterface $movieServiceInterface)
  {
    $this->movieInterface = $movieServiceInterface;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $movie = Movie::latest()->paginate(10);
    //$movie = $this->movieInterface->getMovies();
    return view('movie.movie_list', compact('movie'))
      ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  public function create()
  {
    return view('movie.create_image');
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
    return redirect()->route('movie.index')
      ->with('success', 'Movie created successfully.');
  }


  public function edit(Movie $movie, Showtime $showtime)
  {
    return view('movie.edit_image', compact('movie','showtime'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(MovieInfoRequest $request, Movie $movie, Showtime $showtime)
  {
    $this->movieInterface->update($request, $movie,$showtime);
    return redirect()->route('movie.index')
      ->with('success', 'Movie updated successfully');
  }
}
