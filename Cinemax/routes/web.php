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


Route::group(['middleware' => 'prevent-back-history'], function () {
    //Home View
    Route::get('/', function () {
        return redirect()->route('movie');
    })->name('home');

    //User View
    Route::get('/movie', [MovieController::class, 'get_required_data'])->name('movie');
    Route::get('/movie/{id}', [MovieDescriptionController::class, 'get_details'])->name('description-movie');
    Route::get('/upmovie/{id}', [MovieDescriptionController::class, 'upmovie'])->name('description-upmovie');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'createBooking'])->name('booking-create');
        Route::post('/booking/create/{movie_id}/{showtime_id}', [BookingController::class, 'submitBooking'])->name('booking-create');
        Route::get('/user_edit', [UserController::class, 'showUserEditView'])->name('user-edit');
        Route::post('/user_edit', [UserController::class, 'submitUserEditView'])->name('user-edit-submit');
        Route::post('/password_change', [UserController::class, 'changePassword'])->name('user-passwordchange');
    });

    //Admin View
    Route::group(['middleware' => ['admin', 'auth']], function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('admin');
        Route::get('/movie-admin', [MovieController::class, 'RequiredData_for_ManageMovie'])->name('admin-movie');
        Route::get('/movie-create', [MovieController::class, 'create'])->name('movie-create');
        Route::post('/movie-store', [MovieController::class, 'store'])->name('movie-store');
        Route::get('/movie-edit/{id}', [MovieController::class, 'edit'])->name('movie-edit');
        Route::post('/movie-update/{id}', [MovieController::class, 'update'])->name('movie-update');

        Route::get('/upmovie-create', [UpMovieController::class, 'create'])->name('upmovie-create');
        Route::post('/upmovie-store', [UpMovieController::class, 'store'])->name('upmovie-store');
        Route::get('/upmovie-edit/{id}', [UpMovieController::class, 'edit'])->name('upmovie-edit');
        Route::post('/upmovie-update/{id}', [UpMovieController::class, 'update'])->name('upmovie-update');
        Route::get('/upmovie-delete/{id}', [UpMovieController::class, 'deleteMovie'])->name('upmovie-delete');

        Route::get('/booking', [ManageBookingController::class, 'manageBooking'])->name('booking-index');
        Route::get('/booking/deleteall', [ManageBookingController::class, 'deleteAll'])->name('booking-deleteall');
        Route::get('/booking/delete/{id}', [ManageBookingController::class, 'deleteBooking'])->name('booking-delete');
        Route::get('/booking/search/name', [ManageBookingController::class, 'searchName'])->name('booking-searchName');

        Route::get('/theater/create', [TheaterController::class, 'createTheater'])->name('theater-create');
        Route::post('/theater/create', [TheaterController::class, 'submitTheater'])->name('theater-create');
        Route::get('/theater/manage', [TheaterController::class, 'showTheaters'])->name('theater-manage');
        Route::get('/theater/delete/{theater_id}', [TheaterController::class, 'deleteTheater'])->name('theater-delete');


        Route::get('/reports', [ReportController::class, 'showReports'])->name('statistic');
        Route::get('/reports/chart', [ReportController::class, 'getChartData'])->name('report-chart');
    });
});
//Export Data
Route::group(['middleware' => ['admin', 'auth']], function () {

    Route::get('/export-reports', [ReportController::class, 'export'])->name('export');
    Route::get('/delete-and-export-reports', [ReportController::class, 'deleteANDexport'])->name('delete-export');
});

//Authentication
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'create'])->name('register');

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
});
