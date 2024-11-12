<?php

use App\Jobs\AnotherApprovedJob;
use App\Jobs\SomeApprovedJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs/dashboard', [JobDashboardController::class, 'index'])->name('job.dashboard');

Route::get('/test-job', function () {
    // Run SomeApprovedJob with parameters
    try {
        runBackgroundJob(SomeApprovedJob::class, 'executeJob', ['param1' => 'value1', 'param2' => 'value2']);
        echo "SomeApprovedJob launched successfully.<br>";
    } catch (Exception $e) {
        echo "Failed to launch SomeApprovedJob: " . $e->getMessage() . "<br>";
    }

    // Run AnotherApprovedJob with parameters
    try {
        runBackgroundJob(AnotherApprovedJob::class, 'performTask', ['param1' => 'value1', 'param2' => 'value2']);
        echo "AnotherApprovedJob launched successfully.";
    } catch (Exception $e) {
        echo "Failed to launch AnotherApprovedJob: " . $e->getMessage();
    }
});
