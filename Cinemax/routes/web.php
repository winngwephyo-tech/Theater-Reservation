<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Booking\ManageBookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Theater\TheaterController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\UpMovie\UpMovieController;



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

Route::get('/manage_booking', [ManageBookingController::class, 'manageBooking'])->name('booking.index');
Route::get('/delete_booking/{id}', [ManageBookingController::class, 'deleteBooking'])->name('booking.delete');
//User View
Route::get('/movie_list',[ MovieController::class,'get_required_data'])->name('movie');
//Admin View 
Route::get('/admin_movie_list',[ MovieController::class,'RequiredData_for_ManageMovie'])->name('admin_movie');
Route::get('/create_img',[ MovieController::class,'create'])->name('movie.create');
Route::post('/create',[ MovieController::class,'store'])->name('movie.store');
Route::get('/edit_img/{id}',[ MovieController::class,'edit'])->name('movie.edit');
Route::post('/update',[ MovieController::class,'update'])->name('movie.update');

//UpComing Movie
//Admin View 
Route::get('/up_create_img',[ UpMovieController::class,'create'])->name('upmovie.create');
Route::post('/up_create',[ UpMovieController::class,'store'])->name('upmovie.store');
Route::get('/up_edit_img/{id}',[ UpMovieController::class,'edit'])->name('upmovie.edit');
Route::post('/up_update',[ UpMovieController::class,'update'])->name('upmovie.update');



Route::get('/', function () {
    return view('admin.admin_dashboard');
});

Route::get('/theater/create', [TheaterController::class, 'createTheater'])->name('theater.create');
Route::post('/theater/create', [TheaterController::class, 'submitTheater'])->name('theater.create');
Route::post('/theater/delete/{theater_id}', [TheaterController::class, 'submitTheater'])->name('theater.delete');


Route::get('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'createBooking'])->name('booking.create');
Route::post('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'submitBooking'])->name('booking.create');

Route::get('/reports', [ReportController::class, 'showReports']);
Route::get('/export_reports', [ReportController::class, 'export']);
Route::get('/delete_and_export_reports', [ReportController::class, 'deleteANDexport']);
