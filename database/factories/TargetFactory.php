<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'url' => $this->faker->url(),
        ];
    }
}
