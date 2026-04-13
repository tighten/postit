<?php

use App\Models\Post;
use App\Models\Source;
use App\RssFeed;
use App\RssItem;
use App\RssSync;

function makeRssItem(string $guid, string $title): RssItem
{
    $reflection = new ReflectionClass(RssItem::class);
    $constructor = $reflection->getConstructor();
    $constructor->setAccessible(true);

    $item = $reflection->newInstanceWithoutConstructor();
    $constructor->invoke(
        $item,
        "https://tighten.com/insights/{$guid}/",
        $title,
        '2026-01-01T00:00:00+00:00',
        "https://tighten.com/insights/{$guid}/",
        'Test content',
        null,
        (object) ['name' => 'Test Author'],
    );

    return $item;
}

it('skips podcast episodes during sync', function () {
    $source = Source::factory()->create();

    $fakeFeed = new stdClass;
    $fakeFeed->items = [
        makeRssItem('pragmatic-ai-ep1-aaron-francis', 'Dreaming Bigger With AI'),
        makeRssItem('bol-ep23-joe-rucci-ghostable', 'Building Ghostable'),
        makeRssItem('some-regular-blog-post', 'A Regular Blog Post'),
    ];

    Mockery::mock('overload:' . RssFeed::class)
        ->shouldReceive('fromUrl')
        ->with($source->feed_url)
        ->andReturn($fakeFeed);

    (new RssSync)->sync($source);

    expect(Post::count())->toBe(1)
        ->and(Post::first()->title)->toBe('A Regular Blog Post');
});

it('imports regular blog posts during sync', function () {
    $source = Source::factory()->create();

    $fakeFeed = new stdClass;
    $fakeFeed->items = [
        makeRssItem('how-to-use-laravel', 'How to Use Laravel'),
        makeRssItem('intro-to-livewire', 'Intro to Livewire'),
    ];

    Mockery::mock('overload:' . RssFeed::class)
        ->shouldReceive('fromUrl')
        ->with($source->feed_url)
        ->andReturn($fakeFeed);

    (new RssSync)->sync($source);

    expect(Post::count())->toBe(2);
});
