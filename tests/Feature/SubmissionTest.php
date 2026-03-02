<?php

use App\Models\Post;
use App\Models\Submission;
use App\Models\Target;

it('can create a submission', function () {
    $response = $this->post(route('api.submissions.store'), [
        'target_id' => $targetId = Target::factory()->create(['id' => 5])->id,
        'post_id' => $sourceId = Post::factory()->create(['id' => 12])->id,
    ]);

    $response->assertStatus(200);

    expect(Submission::get())->toHaveCount(1);
    $submission = Submission::first();

    expect($submission->target_id)->toEqual($targetId)
        ->and($submission->post_id)->toEqual($sourceId);
});

it('can delete a submission', function () {
    $submission = Submission::factory()->create();
    expect(Submission::get())->toHaveCount(1)
        ->and(Post::get())->toHaveCount(1)
        ->and(Target::get())->toHaveCount(1);

    $response = $this->delete(route('api.submissions.destroy', [
        'target_id' => $submission->target_id,
        'post_id' => $submission->post_id,
    ]));

    $response->assertOk();

    expect(Submission::get())->toHaveCount(0)
        ->and(Post::get())->toHaveCount(1)
        ->and(Target::get())->toHaveCount(1);
});
