<?php

namespace Database\Seeders;

use App\Post;
use App\Source;
use App\Target;
use Faker\Generator;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        \DB::table('posts')->truncate();

        $faker = app(Generator::class);

        $sources = Source::get()->each(function ($source) {
            Post::factory()->count(10)->create([
                'source_id' => $source->id,
            ]);
        });
    }
}
