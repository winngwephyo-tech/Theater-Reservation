<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Report\ReportController;

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


Route::get('/' , 'Movie\MovieController@index');
Route::get('/' , 'Movie\MovieController@get_required_data');
Route::get('manage_movie' , 'Movie\MovieController@RequiredData_for_ManageMovie');

Route::resource('/movie', MovieController::class);
// Route::get('create',[MovieController::class,'create']);
// Route::get('edit',[MovieController::class,'edit']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'createBooking'])->name('booking.create');
Route::post('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'submitBooking'])->name('booking.create');

Route::get('/reports', [ReportController::class, 'showReports']);
Route::get('/export_reports', [ReportController::class, 'export']);
Route::get('/delete_and_export_reports', [ReportController::class, 'deleteANDexport']);

