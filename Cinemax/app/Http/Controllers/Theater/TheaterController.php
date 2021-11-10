<?php

namespace App\Http\Controllers\Theater;

use App\Contracts\Services\Theater\TheaterServiceInterface;
use App\Contracts\Services\Seat\SeatServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    /**
     * seat interface and theater interface
     */
    private $seatInterface;
    private $theaterInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SeatServiceInterface $seatServiceInterface, TheaterServiceInterface $theaterServiceInterface)
    {
        $this->seatInterface = $seatServiceInterface;
        $this->theaterInterface = $theaterServiceInterface;
    }
    /**
     * To show create theater view
     *
     * @return View create theater
     */
    public function createTheater()
    {
        return view('theater.create_theater');
    }
    /**
     * To check theater create form and redirect to confirm page.
     * @param Request $request Request form theater create
     * @return View theater create confirm
     */
    public function submitTheater(Request $request)
    {
        $theater_id = $this->theaterInterface->addTheaters($request);

        $this->seatInterface->addSeats($request, $theater_id);
    }
}
