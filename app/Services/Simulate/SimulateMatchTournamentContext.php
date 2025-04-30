<?php

namespace App\Services\Simulate;

use App\Models\Tournament;
use Error;

class SimulateMatchTournamentContext
{
    private ISimulateMatch $simulator;

    public function __construct(Tournament $tournament) {
        if($tournament->gender == 'M') {
            $this->simulator = new SimulateMaleMatch();
        }
        if($tournament->gender == 'F') {
            $this->simulator = new SimulateFemaleMatch();
        }
        if ($tournament->gender == 'O') {
            throw new Error('Implement a new strategy');
        }
    }

    public function simulator() : ISimulateMatch {
        return $this->simulator;
    }
}