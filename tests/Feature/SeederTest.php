<?php

use App\Models\Post;
use App\Models\Source;
use App\Models\Submission;
use App\Models\Target;
use Illuminate\Support\Facades\Artisan;

it('can seed the database', function () {
    Artisan::call('db:seed');

    expect(Post::count())->toBeGreaterThan(0)
        ->and(Source::count())->toBeGreaterThan(0)
        ->and(Submission::count())->toBeGreaterThan(0)
        ->and(Target::count())->toBeGreaterThan(0);
});
