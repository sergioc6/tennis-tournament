<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentResult extends Model
{
    protected $table = 'tournament_results';

    protected $fillable = [
        'tournament_id',
        'player_one_id',
        'player_two_id',
        'round',
        'player_winner_id',
        'result',
    ];
}
