<?php

namespace Tests\Feature;

use App\Submission;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    /** @test */
    public function it_can_create_a_submission()
    {
        $submission = Submission::factory()->make();

        $this->post(route('api.submissions.store'), [
            'target_id' => $submission->target_id,
            'post_id' => $submission->post_id,
        ])->assertStatus(200);

        $this->assertDatabaseHas('submissions', $submission->toArray());
    }

    /** @test */
    public function it_can_delete_a_submission()
    {
        $submission = Submission::factory()->create();

        $this->delete(route('api.submissions.destroy', [
            'target_id' => $submission->target_id,
            'post_id' => $submission->post_id,
        ]))->assertOk();

        $this->assertDatabaseMissing('submissions', $submission->toArray());
    }
}
