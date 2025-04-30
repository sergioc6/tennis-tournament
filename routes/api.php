<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SimulateTournamentController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TournamentPlayerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('players', PlayerController::class)->only(['index', 'show']);

Route::apiResource('tournaments', TournamentController::class)->only(['index', 'show', 'store']);
Route::get('/tournaments/{tournament}/players', [TournamentPlayerController::class, 'index']);
Route::post('/tournaments/{tournament}/players', [TournamentPlayerController::class, 'store']);

Route::post('/tournaments/{tournament}/simulate', SimulateTournamentController::class);