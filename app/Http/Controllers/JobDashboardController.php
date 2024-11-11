<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class JobDashboardController extends Controller
{
    public function index()
    {
        $jobLogs = File::get(storage_path('logs/async_jobs.log'));
        $errorLogs = File::get(storage_path('logs/background_jobs_errors.log.log'));
        return view('dashboard', compact('jobLogs', 'errorLogs'));
    }
}
