<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Booking\BookingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking/create', [BookingController::class, 'createBooking'])->name('booking.create');
Route::post('/booking/create', [BookingController::class, 'submitBooking'])->name('booking.create');
