<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SourceSeeder::class);
        $this->call(TargetSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SubmissionSeeder::class);
    }
}
