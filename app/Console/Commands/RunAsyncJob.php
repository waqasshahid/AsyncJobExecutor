<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AsyncJobs\JobExecutor;

class RunAsyncJob extends Command
{
    protected $signature = 'async:run {jobClass} {jobMethod} {params?}';
    protected $description = 'Execute a background job asynchronously';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Retrieve the arguments passed to the command
        $jobClass = $this->argument('jobClass');
        $jobMethod = $this->argument('jobMethod');
        $params = json_decode($this->argument('params'), true) ?: [];

        try {
            JobExecutor::run($jobClass, $jobMethod, $params);
            $this->info("Job $jobClass::$jobMethod executed successfully.");
        } catch (\Exception $e) {
            $this->error("Error executing job $jobClass::$jobMethod: " . $e->getMessage());
        }
    }
}
