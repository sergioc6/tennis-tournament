<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournamentPlayerRequest;
use App\Models\Tournament;
use App\Services\InscribePlayersService;

class TournamentPlayerController extends Controller
{
    protected InscribePlayersService $inscribePlayersService;

    public function __construct(InscribePlayersService $inscribePlayersService)
    {
        $this->inscribePlayersService = $inscribePlayersService;
    }


    public function index(Tournament $tournament)
    {
        return response()->json($tournament->players);
    }

    public function store(Tournament $tournament, StoreTournamentPlayerRequest $request) 
    {
        $players = $request->get('players');
        $result = $this->inscribePlayersService->process($tournament, $players);
        return response()->json([
            'message' => "$result players have been inscribed successfully"
        ]);
    }
}
