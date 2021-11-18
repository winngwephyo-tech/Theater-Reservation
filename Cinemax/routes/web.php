<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Movie\ShowMovieController;

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


Route::get('/' , [ShowMovieController::class , 'get_required_data'])->name('movie.movieList');
Route::get('manage_movie' , [ShowMovieController::class , 'RequiredData_for_ManageMovie']);
Route::get('movie_description/{id}' , [ShowMovieController::class , 'get_details'])->name('movie.movie_description');

Route::resource('movie', MovieController::class);




