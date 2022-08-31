<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackingSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class);

Route::prefix('tracking')->name('tracking.')->group(function () {
    Route::resource('settings', TrackingSettingController::class);
});
