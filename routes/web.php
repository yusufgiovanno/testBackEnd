<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParkingController;
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

Route::view('/', 'parking.parking');
Route::view('/login', 'auth.login');

Route::get ('/data-parkir', [ParkingController::class, 'index']);
Route::get ('/data-search', [ParkingController::class, 'index']);
Route::post('/entry',       [ParkingController::class, 'entry']);
Route::post('/exit',        [ParkingController::class, 'exit' ]);

Route::get('/log-in', [AuthController::class, 'login' ]);
Route::get('/logout', [AuthController::class, 'logout']);