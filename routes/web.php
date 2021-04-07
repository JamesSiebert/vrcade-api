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


Route::get('/', function () {
    return view('welcome');
});


// List values
Route::get('checkins', [\App\Http\Controllers\CheckinController::class, 'index']);
Route::get('credits', [\App\Http\Controllers\CreditController::class, 'index']);
//Route::get('scores', [\App\Http\Controllers\ScoreController::class, 'index']);

//CSV exports
Route::get('checkins_export', [\App\Http\Controllers\CheckinController::class, 'export']);
Route::get('credits_export', [\App\Http\Controllers\CreditController::class, 'export']);
//Route::get('scores_export', [\App\Http\Controllers\ScoreController::class, 'export']);
