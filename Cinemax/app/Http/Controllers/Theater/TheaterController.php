<?php

namespace App\Http\Controllers\Theater;

use App\Contracts\Services\Theater\TheaterServiceInterface;
use App\Contracts\Services\Seat\SeatServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Theater;
use App\Http\Requests\CreateTheaterRequest;

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
     * To show theaters view
     *
     * @return View theater
     */
    public function showTheaters()
    {
        $theaters = $this->theaterInterface->getTheaters();
        return view('theater.manage')-> with(['theaters'=>$theaters]);
    }
    /**
     * To show create theater view
     *
     * @return View create theater
     */
    public function createTheater()
    {
        return view('theater.create');
    }
    /**
     * To check theater create form and redirect to confirm page.
     * @param  \Illuminate\Http\Request  $request
     * @return View theater create confirm
     */
    public function submitTheater(CreateTheaterRequest $request)
    {
        $validated = $request->validated();
        foreach ($request->addmore as $key => $value) {
            $number = $value['number'];
            if ($number > 18) {
                return redirect()->route('theater-create')
                    ->with('error', 'Max Seat number is 18!')
                    ->withInput();
            }
        }
        $theater_id = $this->theaterInterface->addTheaters($request);
        $this->seatInterface->addSeats($request, $theater_id);
        return redirect()->route('theater-manage');
    }
    /**
     * To delete theater if needed
     *
     * @return View probably index page
     */
    public function deleteTheater($theater_id)
    {
        $this->theaterInterface->deleteTheater($theater_id);
        $this->seatInterface->deleteSeats($theater_id);
        return back();
    }
}
