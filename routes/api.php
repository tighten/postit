<?php

Route::post('submissions', 'SubmissionController@store');
Route::delete('submissions', 'SubmissionController@destroy');
