<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Source;
use App\Models\Target;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('submissions')->truncate();

        $targets = Target::get();
        $sources = Source::get();
        $faker = app(Generator::class);
        $rangeTargets = range(0, $targets->count());
        $rangeSources = range(0, $targets->count());

        Post::get()->each(function ($post) use ($targets, $rangeTargets, $faker) {

            $targetIds = $faker->randomElements(
                $targets->pluck('id')->toArray(),
                $faker->randomElement($rangeTargets)
            );

            collect($targetIds)->each(function ($targetId) use ($post) {
                $post->submissions()->create(['target_id' => $targetId]);
            });

        });
    }
}
