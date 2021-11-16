<?php

namespace App\Http\Controllers\UpMovie;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpMovieInfoRequest;
use App\Models\UpcomingMovie;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;

class UpMovieController extends Controller
{
  private $movieInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(UpMovieServiceInterface $movieServiceInterface)
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
    $upmovie = UpcomingMovie::latest()->paginate(5);
    //$movie = $this->movieInterface->getMovies();
    return view('upmovie.upmovie_list', compact('upmovie'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  public function create()
  {
    return view('upmovie.create_image');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UpMovieInfoRequest $request)
  {
    $this->movieInterface->store($request);
    return redirect()->route('upmovie.index')
      ->with('success', 'Movie created successfully.');
  }


  public function edit(UpcomingMovie $upmovie)
  {
    return view('upmovie.edit_image', compact('upmovie'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(UpMovieInfoRequest $request, UpcomingMovie $upmovie)
  {
    $this->movieInterface->update($request, $upmovie);
    return redirect()->route('upmovie.index')
      ->with('success', 'Movie updated successfully');
  }
}
