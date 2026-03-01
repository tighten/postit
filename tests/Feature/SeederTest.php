<?php

use App\Post;
use App\Source;
use App\Submission;
use App\Target;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

uses(Tests\TestCase::class);

it('can seed the database', function () {
    Artisan::call('db:seed');

    $this->assertGreaterThan(0, Post::count());
    $this->assertGreaterThan(0, Source::count());
    $this->assertGreaterThan(0, Submission::count());
    $this->assertGreaterThan(0, Target::count());
});
