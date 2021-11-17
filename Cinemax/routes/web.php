<?php

use Illuminate\Support\Facades\Route;
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


Route::get('/' , [ShowMovieController::class ,'index']);
Route::get('/' , [ShowMovieController::class , 'get_required_data']);
Route::get('manage_movie' , [ShowMovieController::class , 'RequiredData_for_ManageMovie']);
Route::get('movie' , [ShowMovieController::class , 'movie']);
Route::get('create' , [ShowMovieController::class , 'create']);





