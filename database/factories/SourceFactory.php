<?php

namespace Database\Factories;

use App\Source;
use Illuminate\Database\Eloquent\Factories\Factory;

class SourceFactory extends Factory
{
    protected $model = Source::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'feed_url' => $this->faker->url(),
        ];
    }
}
