<?php

use Illuminate\Support\Facades\Route;

////CSV exports
Route::get('checkins_export', [\App\Http\Controllers\CheckinController::class, 'export']);
Route::get('credits_export', [\App\Http\Controllers\CreditController::class, 'export']);
Route::get('scores_export', [\App\Http\Controllers\ScoreController::class, 'export']);

// WILDCARD - REACT
Route::view('/{path?}', 'app');
