<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('scores', [\App\Http\Controllers\ScoreController::class, 'index']);
Route::get('credits', [\App\Http\Controllers\CreditController::class, 'index']);
Route::get('checkins', [\App\Http\Controllers\CheckinController::class, 'index']);

// Unguarded End points
//Route::post('checkin', 'CheckinController@checkin');
//Route::post('checkin', [\App\Http\Controllers\CheckinController::class, 'checkin']);
//
//Route::post('check_credit', [\App\Http\Controllers\CreditController::class, 'check_credit']);
//Route::post('modify_credit', [\App\Http\Controllers\CreditController::class, 'modify_credit']);
//
//Route::get('get_scores', [\App\Http\Controllers\ScoreController::class, 'get_scores']);
//Route::post('post_score', [\App\Http\Controllers\ScoreController::class, 'post_score']);


