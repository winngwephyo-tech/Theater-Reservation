<?php

namespace App\Http\Controllers\UpMovie;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpMovieInfoRequest;
use App\Models\UpcomingMovie;
use App\Contracts\Services\UpMovie\UpMovieServiceInterface;
use Illuminate\Support\Facades\DB;

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
   * create upcomming movie
   */
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
    return redirect()->route('admin_movie')
      ->with('success', 'Movie created successfully.');
  }


   public function edit($id)
  {
    $upmovie = DB::table('upcoming_movies')
      ->where('id', '=', $id)
      ->select('*')
      ->first();
    return view('upmovie.edit_image', compact('upmovie'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(UpMovieInfoRequest $request, $id)
  {
    $this->movieInterface->update($request, $id);
    return redirect()->route('admin_movie')
      ->with('success', 'Movie updated successfully');
  }
  public function deleteMovie($id){
   return $this->movieInterface->deleteMovie($id);
  }
  
}