<?php

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


Route::get('/' , 'Movie\ShowMovieController@index');
Route::get('/' , 'Movie\ShowMovieController@get_required_data');
Route::get('manage_movie' , 'Movie\ShowMovieController@RequiredData_for_ManageMovie');

