<?php

namespace App;

use SimplePie\SimplePie;

class RssFeed
{
    public $feed;

    public $url;

    public $permalink;

    public $title;

    public $items;

    private function __construct($title, $permalink, $items)
    {
        $this->title = $title;
        $this->permalink = $permalink;
        $this->items = $items;
    }

    public static function fromUrl($url)
    {
        $feed = new SimplePie;
        $feed->set_feed_url($url);
        $feed->set_cache_location(storage_path('framework/cache'));
        $feed->set_cache_duration(3600);
        $feed->init();

        return new static(
            $feed->get_title(),
            $feed->get_permalink(),
            static::extractItems($feed->get_items())
        );
    }

    private static function extractItems($feedItems)
    {
        return array_map(function ($feedItem) {
            return RssItem::fromFeedItem($feedItem);
        }, $feedItems);
    }

    public function fake($props)
    {
        foreach ($props as $key => $value) {
            $this->{'$key'} = $value;
        }
    }
}
