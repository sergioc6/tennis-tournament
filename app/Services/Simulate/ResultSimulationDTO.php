<?php

namespace App\Services\Simulate;

use App\Models\Player;

class ResultSimulationDTO {

    protected Player $winner;
    protected Player $looser;
    protected string $result;

    public function __construct(Player $winner, Player $looser, string $result)
    {
        $this->winner = $winner;
        $this->looser = $looser;
        $this->result = $result;
    }

    public function getWinner() : Player {
        return $this->winner;
    }

    public function getLooser() : Player {
        return $this->looser;
    }

    public function getResult() : string {
        return $this->result;
    }
}