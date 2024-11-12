<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class JobDashboardController extends Controller
{
    public function index()
    {
        $jobLogsPath = storage_path('logs/async_jobs.log');
        $errorLogsPath = storage_path('logs/background_jobs_errors.log'); // Updated path

        $jobLogs = File::exists($jobLogsPath) ? File::get($jobLogsPath) : 'No job logs available.';
        $errorLogs = File::exists($errorLogsPath) ? File::get($errorLogsPath) : 'No error logs available.';

        return view('dashboard', compact('jobLogs', 'errorLogs'));
    }
}
