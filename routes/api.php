<?php

use App\Http\Controllers\Api\SubmissionController;
use App\TrackingSetting;
use Illuminate\Support\Facades\Route;

Route::post('submissions', [SubmissionController::class, 'store'])->name('api.submissions.store');
Route::delete('submissions', [SubmissionController::class, 'destroy'])->name('api.submissions.destroy');
Route::get('tracking-settings', function () {
    return TrackingSetting::all();
});
