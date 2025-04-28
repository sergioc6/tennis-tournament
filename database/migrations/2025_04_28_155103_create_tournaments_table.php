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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('year');
            $table->enum('gender', ['M', 'F']);
            $table->float('prize_money');
            $table->integer('players');
            $table->integer('player_champion_id')->nullable();
            $table->integer('player_runner_up_id')->nullable();

            $table->foreign('player_champion_id')->references('id')->on('players');
            $table->foreign('player_runner_up_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
