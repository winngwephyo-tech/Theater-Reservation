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

    public function movie()
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

