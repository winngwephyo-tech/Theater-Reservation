<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Movie\MovieDescriptionController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Booking\ManageBookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Theater\TheaterController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\UpMovie\UpMovieController;
use App\Http\Controllers\User\UserController;

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

//Home View
Route::get('/', function () {
    return redirect('/movie_list');
})->name('home');


//User View
Route::get('/movie_list', [MovieController::class, 'get_required_data'])->name('movie');
Route::get('/movie_description/{id}', [MovieDescriptionController::class, 'get_details'])->name('description_movie');
Route::get('/upmovie_description/{id}', [MovieDescriptionController::class, 'upmovie'])->name('description_upmovie');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'createBooking'])->name('booking.create');
    Route::post('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'submitBooking'])->name('booking.create');
    Route::get('/user_edit', [UserController::class, 'showUserEditView'])->name('user.edit');
    Route::post('/user_edit', [UserController::class, 'submitUserEditView'])->name('user.edit.submit');
    Route::post('/password_change', [UserController::class, 'changePassword'])->name('user.passwordchange');
});

//Admin View
Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/admin', function () {
        return view('admin.admin_dashboard');
    })->name('admin');
    Route::get('/admin_movie_list', [MovieController::class, 'RequiredData_for_ManageMovie'])->name('admin_movie');
    Route::get('/create_movie', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/create', [MovieController::class, 'store'])->name('movie.store');
    Route::get('/edit_movie/{id}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::post('/update/{id}', [MovieController::class, 'update'])->name('movie.update');

    Route::get('/up_create_movie', [UpMovieController::class, 'create'])->name('upmovie.create');
    Route::post('/up_create', [UpMovieController::class, 'store'])->name('upmovie.store');
    Route::get('/up_edit_movie/{id}', [UpMovieController::class, 'edit'])->name('upmovie.edit');
    Route::post('/up_update/{id}', [UpMovieController::class, 'update'])->name('upmovie.update');
    Route::get('/up_delete/{id}', [UpMovieController::class, 'deleteMovie'])->name('upmovie.delete');

    Route::get('/manage_booking', [ManageBookingController::class, 'manageBooking'])->name('booking.index');
    Route::get('/delete_booking/{id}', [ManageBookingController::class, 'deleteBooking'])->name('booking.delete');

    Route::get('/theater/create', [TheaterController::class, 'createTheater'])->name('theater.create');
    Route::post('/theater/create', [TheaterController::class, 'submitTheater'])->name('theater.create');
    Route::get('/theater/manage', [TheaterController::class, 'showTheaters'])->name('theater.manage');
    Route::get('/theater/delete/{theater_id}', [TheaterController::class, 'deleteTheater'])->name('theater.delete');


    Route::get('/reports', [ReportController::class, 'showReports'])->name('statistic');
    Route::get('/reports/chart', [ReportController::class, 'getChartData'])->name('report.chart');
    Route::get('/export_reports', [ReportController::class, 'export']);
    Route::get('/delete_and_export_reports', [ReportController::class, 'deleteANDexport']);

    Route::post('/register', [RegisterController::class, 'create'])->name('register');
    Route::get('/manage_booking', [ManageBookingController::class, 'manageBooking'])->name('booking.index');
    Route::get('/delete_booking/{id}', [ManageBookingController::class, 'deleteBooking'])->name('booking.delete');
    Route::get('/searchName', [ManageBookingController::class, 'searchName'])->name('booking.searchName');
});


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
