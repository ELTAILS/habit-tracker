<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $list = [
            'Beber mais água',
            'Estudar mais',
            'Ler livros',
            'Comer frutas',
            'Beber menos monster',
            'Assitir mais anime'
        ];

        return [
            'user_id' => 1,
            'name' => $this->faker->unique()->randomElement($list)
        ];
    }
}
