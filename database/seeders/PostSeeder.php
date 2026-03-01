<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Source;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->truncate();

        $faker = app(Generator::class);

        $sources = Source::get()->each(function ($source) {
            Post::factory()->count(10)->create([
                'source_id' => $source->id,
            ]);
        });
    }
}
