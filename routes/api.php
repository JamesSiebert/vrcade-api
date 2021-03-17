<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Unguarded End points
//Route::post('checkin', 'CheckinController@checkin');
Route::post('checkin', [\App\Http\Controllers\CheckinController::class, 'checkin']);

Route::post('check_credit', [\App\Http\Controllers\CreditController::class, 'check_credit']);
Route::post('modify_credit', [\App\Http\Controllers\CreditController::class, 'modify_credit']);
