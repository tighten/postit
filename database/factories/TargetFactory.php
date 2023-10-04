<?php

namespace Database\Factories;

use App\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    protected $model = Target::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'url' => $this->faker->url(),
        ];
    }
}
