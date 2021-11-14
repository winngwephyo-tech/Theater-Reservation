<?php

namespace App\Http\Controllers\Booking;

use App\Contracts\Services\Booking\BookingServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;

class BookingController extends Controller
{
  private $bookingInterface;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(BookingServiceInterface $bookingServiceInterface)
  {
    $this->bookingInterface = $bookingServiceInterface;
  }


  public function index()
  {
    $bookingList = $this->bookingInterface->manageBooking();
    return view('booking.bookingList', compact('bookingList'));
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function confirmBooking()
  {
    $booking = $this->bookingInterface->getConfirmInfo();
    return view('booking.booking', compact('booking'));
   // print_r($booking);
  }

  public function manageBooking()
  {
    $bookingList = $this->bookingInterface->manageBooking();
      // print_r($bookingList);
    return view('booking.bookingList', compact('bookingList'));
  }

  // public function create()
  // {
  //   return view('booking.create');
  // }


  // /**
  //  * Store a newly created resource in storage.
  //  *
  //  * @param  \Illuminate\Http\Request  $request
  //  * @return \Illuminate\Http\Response
  //  */
  // public function store(Request $request)
  // {

  //   $request->validate([
  //     'theater_id'=>'required',
  //     'genre'=>'required',
  //     'title'=>'required',
  //     //'poster'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'poster'=>'required',
  //     'details'=>'required',
  //     'rating'=>'required',
  //     'trailer'=>'required',
  //     'duration'=>'required',
  //     'cast'=>'required',

  //   ]);

  //   $input = $request->all();
   
    

  //   if ($image = $request->file('poster')) {
  //     $destinationPath = 'image/';
  //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
  //     $image->move($destinationPath, $profileImage);
  //     $input['poster'] = "$profileImage";
  //   }
  //   //return $input;
  //    Movie::create($input);

  //   return redirect()->route('booking.index')
  //     ->with('success', 'Movie created successfully.');
  // }


  // public function edit(Movie $movie)
  // {
  //     //return view('booking.edit_image',compact('movie'));
  //     return $movie;
  // }

  // /**
  //  * Update the specified resource in storage.
  //  *
  //  * @param  \Illuminate\Http\Request  $request
  //  * @param  \App\Product  $product
  //  * @return \Illuminate\Http\Response
  //  */
  // public function update(Request $request, Movie $movie)
  // {
  //   $request->validate([
  //     'theater_id'=>'required',
  //     'genre'=>'required',
  //     'title'=>'required',
  //     'details'=>'required',
  //     'rating'=>'required',
  //     'trailer'=>'required',
  //     'duration'=>'required',
  //     'cast'=>'required',

  //   ]);


  //     $input = $request->all();

  //     if ($image = $request->file('poster')) {
  //         $destinationPath = 'image/';
  //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
  //         $image->move($destinationPath, $profileImage);
  //         $input['poster'] = "$profileImage";
  //     }else{
  //         unset($input['poster']);
  //     }
      
  //     $movie->update($input);

  //     return redirect()->route('booking.bookingList')
  //                     ->with('success','Movie updated successfully');
  // }


}
