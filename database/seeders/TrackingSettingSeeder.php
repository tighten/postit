<?php

namespace Database\Seeders;

use App\TrackingSetting;
use Illuminate\Database\Seeder;

class TrackingSettingSeeder extends Seeder
{
    public function run()
    {
        TrackingSetting::create([
            'key' => 'campaigns',
            'value' => [
                'blog_post' => 'Blog Post',
                'advertisement' => 'Advertisement',
                'podcast' => 'Podcast',
                'promo' => 'Promo',
            ],
        ]);

        TrackingSetting::create([
            'key' => 'sources',
            'value' => [
                'twitter' => 'Twitter',
                'linkedin' => 'LinkedIn',
                'facebook' => 'Facebook',
                'youtube' => 'YouTube',
                'laravel' => 'Laravel',
                'livewire' => 'Livewire',
                'github' => 'GitHub',
                'laravel_news' => 'Laravel News',
                'calebporzio' => 'calebporzio.com',
                'mattstauffer' => 'mattstauffer.com',
                'jigsaw' => 'Jigsaw',
                'laracasts' => 'Laracasts',
            ],
        ]);

        TrackingSetting::create([
            'key' => 'mediums',
            'value' => [
                'post' => 'Post',
                'banner' => 'Banner',
                'email' => 'Email',
                'link' => 'Link',
                'search' => 'Search',
                'sponsor' => 'Sponsor',
            ],
        ]);
    }
}
