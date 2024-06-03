<?php

namespace Database\Seeders;

use App\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    protected $targets = [
        [
            'name' => 'Laravel News',
            'url' => 'https://laravel-news.com/links/submit',
        ],
        [
            'name' => 'Freek.dev',
            'url' => 'https://freek.dev/community/link/create',
        ],
    ];

    public function run(): void
    {
        \DB::table('targets')->truncate();

        foreach ($this->targets as $target) {
            Target::create($target);
        }
    }
}
