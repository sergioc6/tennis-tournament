<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTournamentRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tournament::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTournamentRequest $request)
    {
        return Tournament::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        return $tournament;
    }

}
