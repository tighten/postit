<?php

namespace Tests\Feature;

use App\Post;
use App\Source;
use App\Submission;
use App\Target;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SeederTest extends TestCase
{
    #[Test]
    public function it_can_seed_the_database(): void
    {
        \Artisan::call('db:seed');

        $this->assertGreaterThan(0, Post::count());
        $this->assertGreaterThan(0, Source::count());
        $this->assertGreaterThan(0, Submission::count());
        $this->assertGreaterThan(0, Target::count());
    }
}
