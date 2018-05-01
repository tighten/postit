<?php

use App\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    protected $sources = [
        [
            'name' => 'Tighten Blog',
            'feed_url' => 'https://tighten.co/blog/feed.atom'
        ],
    ];

    public function run()
    {
        foreach ($this->sources as $source) {
            Source::create($source);
        }
    }
}
