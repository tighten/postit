<?php

namespace Database\Factories;

use App\Post;
use App\Submission;
use App\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    protected $model = Submission::class;

    public function definition()
    {
        return [
            'target_id' => Target::factory()->create()->id,
            'post_id' => Post::factory()->create()->id,
        ];
    }
}
