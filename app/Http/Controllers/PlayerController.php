<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Player::paginate();
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return $player;
    }
}
