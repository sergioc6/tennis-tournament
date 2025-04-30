<?php

namespace App\Services\Simulate;

use App\Models\Player;

interface ISimulateMatch {
    public function simulateMatch (Player $playerOne, Player $playerTwo) : ResultSimulationDTO;
}