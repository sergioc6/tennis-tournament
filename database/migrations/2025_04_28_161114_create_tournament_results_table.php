<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tournament_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('tournament_id');
            $table->integer('player_one_id');
            $table->integer('player_two_id');
            $table->integer('player_winner_id')->nullable();
            $table->string('result')->nullable();

            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->foreign('player_one_id')->references('id')->on('players');
            $table->foreign('player_two_id')->references('id')->on('players');
            $table->foreign('player_winner_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_results');
    }
};
