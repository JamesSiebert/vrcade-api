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

//Route::get('/', function () {
//    return view('checkin_log');
//});

Route::get('/', [\App\Http\Controllers\CheckinController::class, 'index']);

Route::get('credit', [\App\Http\Controllers\CreditController::class, 'index']);
