<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name',
        'year',
        'gender',
        'prize_money',
        'players_count',
        'player_champion_id'
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'tournament_player');
    }

    public function champion()
    {
        return $this->hasOne(Player::class, 'id', 'player_champion_id');
    }
}
