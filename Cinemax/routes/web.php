<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Theater\TheaterController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/theater/create', [TheaterController::class, 'createTheater'])->name('theater.create');
Route::post('/theater/create', [TheaterController::class, 'submitTheater'])->name('theater.create');
Route::post('/theater/delete/{theater_id}', [TheaterController::class, 'submitTheater'])->name('theater.delete');
