<?php

namespace Tests\Feature;

use App\Post;
use App\Submission;
use App\Target;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    /** @test */
    public function it_can_create_a_submission()
    {
        $response = $this->post(route('api.submissions.store'), [
            'target_id' => $targetId = Target::factory()->create(['id' => 5])->id,
            'post_id' => $sourceId = Post::factory()->create(['id' => 12])->id,
        ]);

        $response->assertStatus(200);

        $this->assertCount(1, Submission::get());
        $submission = Submission::first();

        $this->assertEquals($targetId, $submission->target_id);
        $this->assertEquals($sourceId, $submission->post_id);
    }

    /** @test */
    public function it_can_delete_a_submission()
    {
        $submission = Submission::factory()->create();
        $this->assertCount(1, Submission::get());
        $this->assertCount(1, Post::get());
        $this->assertCount(1, Target::get());

        $response = $this->delete(route('api.submissions.destroy', [
            'target_id' => $submission->target_id,
            'post_id' => $submission->post_id,
        ]));

        $response->assertOk();

        $this->assertCount(0, Submission::get());
        $this->assertCount(1, Post::get());
        $this->assertCount(1, Target::get());
    }
}
