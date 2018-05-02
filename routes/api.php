<?php

use App\Submission;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('submissions', function () {
    Submission::where('target_id', request('target_id'))
        ->where('post_id', request('post_id'))
        ->delete();

    return 'deleting where target_id is ' . request('target_id') . ' and post_id is ' . request('post_id');
});

Route::post('submissions', function () {
    Submission::create([
        'target_id' => request('target_id'),
        'post_id' => request('post_id'),
    ]);
});
