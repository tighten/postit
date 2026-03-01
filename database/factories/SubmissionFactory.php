<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Target;
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
