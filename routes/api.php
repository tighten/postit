<?php

use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::post('submissions', [SubmissionController::class, 'store']);
Route::delete('submissions', [SubmissionController::class, 'destroy']);
