<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Services\SimulateTournamentService;

class SimulateTournamentController extends Controller
{
    protected SimulateTournamentService $simulateTournamentService;

    public function __construct(SimulateTournamentService $simulateTournamentService)
    {
        $this->simulateTournamentService = $simulateTournamentService;
    }
    
    public function __invoke(Tournament $tournament)
    {
        $this->simulateTournamentService->process($tournament);
    }
}
