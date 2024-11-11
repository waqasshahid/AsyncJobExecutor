<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;

class SomeApprovedJob
{
    public function executeJob($param1, $param2)
    {
        Log::info("Executing SomeApprovedJob with parameters: $param1, $param2");

        // Simulate some job processing logic
        return "Result from SomeApprovedJob with $param1 and $param2";
    }
}
