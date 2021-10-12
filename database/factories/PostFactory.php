<?php

namespace Database\Factories;

use App\Post;
use App\Source;
use App\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'source_id' => function () {
                return Source::factory()->create()->id;
            },
            'guid' => $this->faker->lexify("???????????????"),
            'title' => $this->faker->sentence(6),
            'abstract' => $this->faker->paragraph(2),
            'author' => $this->faker->name,
            'published_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
