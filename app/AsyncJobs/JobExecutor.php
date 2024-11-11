<?php

namespace App\AsyncJobs;

use Illuminate\Support\Facades\Log;

class JobExecutor
{
    public static function run($jobClassName, $jobMethod, $params = [])
    {
        // Authorization check: only allow jobs listed in the allowed_jobs config file
        if (!in_array($jobClassName, config('allowed_jobs.classes'))) {
            throw new \Exception("Unauthorized job class: $jobClassName");
        }

        try {
            $jobInstance = new $jobClassName();
            $result = call_user_func_array([$jobInstance, $jobMethod], $params);
            self::logJobStatus($jobClassName, $jobMethod, 'success');
            return $result;
        } catch (\Exception $e) {
            self::logJobError($jobClassName, $jobMethod, $e->getMessage());
            throw $e;
        }
    }

    public static function runWithRetries($jobClassName, $jobMethod, $params = [], $maxRetries = 3)
    {
        $attempt = 0;
        while ($attempt < $maxRetries) {
            try {
                return self::run($jobClassName, $jobMethod, $params);
            } catch (\Exception $e) {
                $attempt++;
                if ($attempt >= $maxRetries) {
                    throw $e;
                }
            }
        }
        return null;
    }

    private static function logJobStatus($jobClassName, $jobMethod, $status)
    {
        Log::channel('async_jobs')->info("Job: $jobClassName::$jobMethod - Status: $status");
    }

    private static function logJobError($jobClassName, $jobMethod, $errorMessage)
    {
        Log::channel('async_jobs_errors')->error("Job: $jobClassName::$jobMethod - Error: $errorMessage");
    }
}
