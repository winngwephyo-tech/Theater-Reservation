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


Route::get('/' , 'Movie\MovieController@index');
Route::get('/' , 'Movie\MovieController@get_required_data');
Route::get('manage_movie' , 'Movie\MovieController@RequiredData_for_ManageMovie');
