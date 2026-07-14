<?php

namespace App;

use App\Models\Post;
use App\Models\Source;
use Illuminate\Support\Carbon;

class RssSync
{
    private const PODCAST_URL_PATTERNS = [
        'pragmatic-ai-ep',
        'bol-ep',
    ];

    public function sync(Source $source)
    {
        $feed = RssFeed::fromUrl($source->feed_url);

        foreach ($feed->items as $item) {
            if ($this->isPodcastEpisode($item)) {
                continue;
            }

            $this->importItem($item, $source);
        }
    }

    private function isPodcastEpisode(RssItem $item): bool
    {
        foreach (self::PODCAST_URL_PATTERNS as $pattern) {
            if (str_contains($item->guid, $pattern)) {
                return true;
            }
        }

        return false;
    }

    private function importItem($item, $source)
    {
        return Post::updateOrCreate(
            [
                'guid' => $item->guid,
                'source_id' => $source->id,
            ],
            $this->transformItem($item)
        );
    }

    private function transformItem($item)
    {
        return [
            'title' => $item->title,
            'abstract' => $this->contentToAbstract($item->content),
            'author' => $item->author ? $item->author->name : 'Content Team',
            'published_at' => Carbon::parse($item->published_at)->tz('UTC')->toDateTimeString(),
        ];
    }

    private function contentToAbstract($content)
    {
        return mb_substr($content, 0, 225) . '...';
    }
}
