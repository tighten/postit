<?php

use App\Post;
use App\Source;
use App\Submission;
use App\Target;
use Illuminate\Support\Facades\Artisan;

it('can seed the database', function () {
    Artisan::call('db:seed');

    expect(Post::count())->toBeGreaterThan(0);
    expect(Source::count())->toBeGreaterThan(0);
    expect(Submission::count())->toBeGreaterThan(0);
    expect(Target::count())->toBeGreaterThan(0);
});
