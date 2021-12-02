<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieInfoRequest;
use App\Contracts\Services\Movie\MovieServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * MovieServiceInterface
     */
    private $movieInterface;
    private $userInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        MovieServiceInterface $MovieServiceInterface,
        UserServiceInterface $UserServiceInterface
    ) {
        $this->movieInterface = $MovieServiceInterface;
        $this->userInterface = $UserServiceInterface;
    }
    /**
     * Display a listing of the resource.
     * @return view userview
     */
    public function get_required_data()
    {
        $no_of_theater = $this->movieInterface->count_theater();
        $showingMovie_result = $this->movieInterface->get_showingMovieData();
        $no_of_upcomingMovie = $this->movieInterface->count_upcomingMovie();
        $upcomingMovie_result = $this->movieInterface->get_upcomingMovieData();
        return view('movie.index')
            ->with([
                'no_of_theater' => $no_of_theater,
                'showingMovie_result' => $showingMovie_result,
                'no_of_upcomingMovie' => $no_of_upcomingMovie,
                'upcomingMovie_result' => $upcomingMovie_result
            ]);
    }
    /**
     * Display a listing of the resource.
     * @return view for admin with \Illuminate\Http\Response
     */
    public function RequiredData_for_ManageMovie()
    {
        $no_of_theater = $this->movieInterface->count_theater();
        $showingMovie_result = $this->movieInterface->get_showingMovieData();
        $no_of_upcomingMovie = $this->movieInterface->count_upcomingMovie();
        $upcomingMovie_result = $this->movieInterface->get_upcomingMovieData();
        return view('movie.manage')
            ->with([
                'no_of_theater' => $no_of_theater,
                'showingMovie_result' => $showingMovie_result,
                'no_of_upcomingMovie' => $no_of_upcomingMovie,
                'upcomingMovie_result' => $upcomingMovie_result
            ]);
    }
    /**
     * @return view
     */

    public function create()
    {
        $theaters = $this->movieInterface->create();
        return view('movie.create')->with('theaters', $theaters);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieInfoRequest $request)
    {
        $request->validate([
            'poster' => 'required',
        ]);
        $theater_id = $request->theater_id;
        $movie_theater_id = Movie::select('theater_id')->get();
        foreach ($movie_theater_id as  $value) {
            if ($theater_id == $value['theater_id']) {
                return redirect()->back()->withErrors(['msg' =>'Now Theater is not unavaiable']);
            }
        }
        $this->movieInterface->store($request);
        return redirect()->route('admin-movie')
            ->with('success', 'Movie created successfully.');
    }
    /**
     * Edit Movie By movie Id
     * @param Movie $id
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
        $theaters = $this->movieInterface->create();
        return view('movie.edit')->with([
            'movie' => $movie,
            'showtime' => $showtime,
            'theaters' => $theaters
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Movie $id
     * @return view with \Illuminate\Http\Response
     */
    public function update(MovieInfoRequest $request, $id)
    {
        $this->movieInterface->update($request, $id);
        return redirect()->route('admin-movie')
            ->with('success', 'Movie updated successfully');
    }
}
