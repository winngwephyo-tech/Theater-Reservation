<?php

use App\Http\Controllers\Movie\MovieDescriptionController;
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

Route::get('movie_description/{id}' , [ShowMovieController::class , 'get_details'])->name('movie.movie_description');
