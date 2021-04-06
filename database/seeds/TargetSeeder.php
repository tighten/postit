<?php

use App\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    protected $targets = [
        [
            'name' => 'Laravel News',
            'url' => 'https://laravel-news.com/links/create',
        ],
    ];

    public function run()
    {
        foreach ($this->targets as $target) {
            Target::create($target);
        }
    }
}
