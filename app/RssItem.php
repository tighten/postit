<?php

namespace App;

class RssItem
{
    public $permalink;
    public $title;
    public $published_at;
    public $guid;
    public $content;
    public $enclosure;
    public $author;

    private function __construct(
        $permalink,
        $title,
        $published_at,
        $guid,
        $content,
        $enclosure,
        $author
    ) {
        $this->permalink = $permalink;
        $this->title = $title;
        $this->published_at = $published_at;
        $this->guid = $guid;
        $this->content = $content;
        $this->enclosure = $enclosure;
        $this->author = $author;
    }

    public static function fromFeedItem($feedItem)
    {
        return new static(
            $feedItem->get_permalink(),
            $feedItem->get_title(),
            $feedItem->get_date('c'),
            $feedItem->get_id(),
            $feedItem->get_content(),
            $feedItem->get_enclosure()->get_link(),
            $feedItem->get_author()
        );
    }
}
