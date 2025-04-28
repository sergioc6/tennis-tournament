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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->enum('gender', ['M', 'F', 'O']);
            $table->integer('skill');
            $table->integer('strength');
            $table->integer('movement_speed');
            $table->integer('reaction_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
