<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Movie\MovieDescriptionServiceInterface;
use Illuminate\Support\Facades\DB;

class MovieDescriptionController extends Controller
{
    private $MovieDescriptionInterface;

    public function __construct(MovieDescriptionServiceInterface $MovieDescriptionServiceInterface)
    {
        $this->MovieDescriptionInterface = $MovieDescriptionServiceInterface;
    }

    public function get_details($id)
    {
        $movie = $this->MovieDescriptionInterface->movie_details($id);

        $showtime = $this->MovieDescriptionInterface->showtime($id);
        // dd($movie);
        return view('movie.movie_description')->with(['movie' => $movie, 'showtime' => $showtime]);
    }
}
