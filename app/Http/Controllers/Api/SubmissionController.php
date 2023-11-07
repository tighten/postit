<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Submission;

class SubmissionController extends Controller
{
    public function store()
    {
        Submission::create([
            'target_id' => request('target_id'),
            'post_id' => request('post_id'),
        ]);
    }

    public function destroy()
    {
        Submission::where('target_id', request('target_id'))
            ->where('post_id', request('post_id'))
            ->delete();
    }
}
