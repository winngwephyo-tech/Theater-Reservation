<?php

use App\Http\Controllers\Booking\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('booking/confirm_booking');
// });
Route::resource('booking', BookingController::class);
Route::get('confirm_booking',[BookingController::class,'confirmBooking']);
Route::get('manage_booking',[BookingController::class,'manageBooking']);



