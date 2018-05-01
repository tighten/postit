<?php

namespace App;

use App\RssFeed;
use App\Source;
use Carbon\Carbon;
use Exception;

class RssSync
{
    public function sync(Source $source)
    {
        $feed = RssFeed::fromUrl($source->feed_url);

        foreach ($feed->items as $item) {
            $this->importItem($item, $source);
        }
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
        return substr($content, 0, 225) . '...';
    }
}
