<?php

namespace App\Http\Controllers\UpMovie;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpMovieInfoRequest;
use App\Models\UpcomingMovie;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;
use Illuminate\Support\Facades\DB;

class UpMovieController extends Controller
{
  /**
   * UpMovieServiceInterface
   */

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
   * create upcomming movie
   * @return view of upcoming movie 
   */
  public function create()
  {
    return view('upmovie.create');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UpMovieInfoRequest $request)
  {
    $request->validate([
      'poster' => 'required',
    ]);
    $this->movieInterface->store($request);
    return redirect()->route('admin-movie')
      ->with('success', 'Movie created successfully.');
  }
  /**
   * Edit Upcoming Movie By Id
   * @param  UpcomingMovie $id
   */

  public function edit($id)
  {
    $upmovie = DB::table('upcoming_movies')
      ->where('id', '=', $id)
      ->select('*')
      ->first();
    return view('upmovie.edit')->with(['upmovie' => $upmovie]);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  UpcomingMovie $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpMovieInfoRequest $request, $id)
  {
    $this->movieInterface->update($request, $id);
    return redirect()->route('admin-movie')
      ->with('success', 'Movie updated successfully');
  }
  /**
   * @param Movie $id
   * @return \Illuminate\Http\Response
   */
  public function deleteMovie($id)
  {
    return $this->movieInterface->deleteMovie($id);
  }
}
