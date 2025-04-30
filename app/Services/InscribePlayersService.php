<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Tournament;
use Error;

class InscribePlayersService
{
    public function process(Tournament $tournament, array $playersIds): int
    {
        $uniquePlayers = array_unique($playersIds);

        if ($tournament->players_count != count($uniquePlayers)) {
            throw new Error('Number of players is not correct');
        }

        if ($tournament->players_count == count($tournament->players)) {
            throw new Error('The inscription is fulled');
        }

        $players = Player::find($uniquePlayers);
        foreach ($players as $player) {
            if($player->gender != $tournament->gender) {
                throw new Error("Player ID={$player->id} can't be inscribed. Gender not matching.");
            }
        }

        $tournament->players()->attach($uniquePlayers);
        return count($players);
    }
}
