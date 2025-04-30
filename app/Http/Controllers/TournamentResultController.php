<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentResultController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tournament $tournament, Request $request)
    {
        return $tournament->results;
    }
}
