<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Tournament;
use App\Models\TournamentResult;
use App\Services\Simulate\ISimulateMatch;
use App\Services\Simulate\SimulateMatchTournamentContext;
use Error;

class SimulateTournamentService
{
    private ISimulateMatch $simulator;

    private Tournament $tournament;

    public function process(Tournament $tournament): array
    {
        $this->tournament = $tournament;
        $playersInscribed = $this->tournament->players;

        if($this->tournament->player_champion_id) {
            throw new Error('The tournament is finished');
        }

        if ($this->tournament->players_count != count($playersInscribed)) {
            throw new Error('The tournament is not fully');
        }

        $context = new SimulateMatchTournamentContext($this->tournament);
        $this->simulator = $context->simulator();

        return $this->simulateRound($playersInscribed->all());
    }

    private function groupPlayersRandom(array $players): array
    {
        shuffle($players);

        $groups = [];
        for ($i = 0; $i < count($players); $i += 2) {
            $par = [$players[$i]];

            if (isset($players[$i + 1])) {
                $par[] = $players[$i + 1];
            }

            $groups[] = $par;
        }
        return $groups;
    }

    private function simulateRound(array $players): array
    {
        $groups = $this->groupPlayersRandom($players);
        $round = count($groups);
        $winners = [];
        foreach ($groups as $group) {
            $resultSimulator = $this->simulator->simulateMatch($group[0], $group[1]);

            TournamentResult::create([
                'tournament_id' => $this->tournament->id,
                'player_one_id' => $group[0]->id,
                'player_two_id' => $group[1]->id,
                'player_winner_id' => $resultSimulator->getWinner()->id,
                'round' => $round,
                'result' => $resultSimulator->getResult()
            ]);

            $winners[] = $resultSimulator->getWinner();
        }

        if (count($winners) > 1) {
            return $this->simulateRound($winners);
        }

        $champion = $winners[0];
        $this->declareWinner($champion);

        return $winners;
    }

    private function declareWinner(Player $playerWinner): void
    {
        $this->tournament->update([
            'player_champion_id' => $playerWinner->id
        ]);
    }
}
