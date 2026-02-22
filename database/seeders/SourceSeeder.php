<?php

namespace Database\Seeders;

use App\Source;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    protected $sources = [
        [
            'name' => 'Tighten Blog',
            'feed_url' => 'https://tighten.co/blog/feed.atom',
        ],
        // [
        //     'name' => 'Twenty Percent Time',
        //     'feed_url' => '@todo',
        // ],
        // [
        //     'name' => 'Laravel Podcast',
        //     'feed_url' => '@todo',
        // ],
        [
            'name' => 'MattStauffer.com',
            'feed_url' => 'https://mattstauffer.com/blog/feed.atom',
        ],
    ];

    public function run(): void
    {
        DB::table('sources')->truncate();

        foreach ($this->sources as $source) {
            Source::create($source);
        }
    }
}
