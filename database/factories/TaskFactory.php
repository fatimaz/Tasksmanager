<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, 
            'name' =>  $this->faker->words(2, true),
            'description' => $this->faker->sentence(4),
            'status' => $this->faker->randomElement([0, 1]), 
            'due_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
