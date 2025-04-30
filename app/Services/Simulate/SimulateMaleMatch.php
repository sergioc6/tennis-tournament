<?php

namespace App\Services\Simulate;

use App\Models\Player;

class SimulateMaleMatch implements ISimulateMatch{

    public function simulateMatch(Player $playerOne, Player $playerTwo): ResultSimulationDTO
    {
        $scoreOne = ($playerOne->movement_speed + $playerOne->strength) * rand(1,5);
        $scoreTwo = ($playerOne->movement_speed + $playerOne->strength) * rand(1,5);

        if ($scoreOne > $scoreTwo) {
            $playerWinner = $playerOne;
            $playerLooser = $playerTwo;
        } else {
            $playerWinner = $playerTwo;
            $playerLooser = $playerOne;
        }

        return new ResultSimulationDTO(
            $playerWinner,
            $playerLooser,
            TennisMatchResult::random()->value()
        );
    }
}