<?php

namespace App\Http\Controllers\Movie;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieDescriptionController extends Controller
{
   public function book_movie()
   {
       return view('movie.movie_description');
   }

    public function get_poster($id)
    {
        $data = Movie::where('id' , $id)->get();

        return view('movie.movie_descripton')->with(['data'=>$data]);
    }
}
