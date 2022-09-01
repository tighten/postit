<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackingSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class);

Route::prefix('tracking')->name('tracking.')->group(function () {
    Route::get('/', function () {
        return view('tracking');
    });
    //->middleware('auth.basic');

    Route::resource('settings', TrackingSettingController::class);
});
