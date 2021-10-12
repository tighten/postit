<?php

namespace Tests\Feature;

use App\Post;
use App\Source;
use App\Submission;
use App\Target;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeederTest extends TestCase
{
    /** @test */
    public function it_can_seed_the_database()
    {
        \Artisan::call("db:seed");

        $this->assertGreaterThan(0, Post::count());
        $this->assertGreaterThan(0, Source::count());
        $this->assertGreaterThan(0, Submission::count());
        $this->assertGreaterThan(0, Target::count());
    }
}
