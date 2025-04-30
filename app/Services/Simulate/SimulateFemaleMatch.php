<?php

namespace App\Services\Simulate;

use App\Models\Player;

class SimulateFemaleMatch implements ISimulateMatch {

    public function simulateMatch(Player $playerOne, Player $playerTwo): ResultSimulationDTO
    {
        $scoreOne = ($playerOne->reaction_time + $playerOne->strength + $playerOne->movement_speed) * rand(1,5);
        $scoreTwo = ($playerTwo->reaction_time + $playerTwo->strength + $playerTwo->movement_speed) * rand(1,5);

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