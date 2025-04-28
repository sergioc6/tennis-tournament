<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gendersList = ['male', 'female'];
        $gender = $gendersList[array_rand($gendersList)];

        return [
            'name' => fake()->name($gender),
            'gender' => $gender == 'male' ? 'M' : 'F',
            'skill' => fake()->numberBetween(0, 100),
            'strength' => fake()->numberBetween(0, 100),
            'movement_speed' => fake()->numberBetween(0, 100),
            'reaction_time' => fake()->numberBetween(0, 100),
        ];
    }
}
