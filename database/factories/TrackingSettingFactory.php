<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrackingSettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'key' => $this->faker->word,
            'value' => $this->faker->words(10),
        ];
    }
}
