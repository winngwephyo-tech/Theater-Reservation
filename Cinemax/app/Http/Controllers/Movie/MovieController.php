<?php

namespace App\Http\Controllers\Movie;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
  {
      $movie = Movie::latest()->paginate(5);

      return view('movie.movie_list',compact('movie'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    public function create()
    {
      return view('movie.create');
    }

    public function store(Request $request)
    {

      $request->validate([
        'theater_id'=>'required',
        'genre'=>'required',
        'title'=>'required',
        'poster'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'details'=>'required',
        'rating'=>'required',
        'trailer'=>'required',
        'duration'=>'required',
        'cast'=>'required',

      ]);

      $input = $request->all();



 if ($image = $request->file('poster')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['poster'] = "$profileImage";
      }
      //return $input;
       Movie::create($input);

      return redirect()->route('movie.index')
        ->with('success', 'Movie created successfully.');
    }

}
