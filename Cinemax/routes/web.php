<?php

use App\Http\Controllers\UpMovie\UpMovieController;
use Illuminate\Support\Facades\Route;
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


Route::resource('upmovie', UpMovieController::class);

Route::resource('/movie', MovieController::class);
// Route::get('create',[MovieController::class,'create']);
// Route::get('edit',[MovieController::class,'edit']);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/reports', [ReportController::class, 'showReports']);
Route::get('/export_reports', [ReportController::class, 'export']);
Route::get('/delete_and_export_reports', [ReportController::class, 'deleteANDexport']);
