<?php

namespace Database\Factories;

use App\Post;
use App\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'target_id' => Target::factory()->create()->id,
            'post_id' => Post::factory()->create()->id,
        ];
    }
}
