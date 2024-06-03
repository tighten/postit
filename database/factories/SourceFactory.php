<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SourceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'feed_url' => $this->faker->url(),
        ];
    }
}
