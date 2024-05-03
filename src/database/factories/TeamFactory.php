<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    public function modelName(): string
    {
        return Team::class;
    }

    public function definition(): array
    {
        $datetime = $this->faker->dateTime();

        return [
            'name' => $this->faker->company(),
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];
    }
}
