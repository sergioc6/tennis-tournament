<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('players', PlayerController::class)->only(['index', 'show']);

Route::apiResource('tournaments', TournamentController::class)->only(['index', 'show', 'store']);